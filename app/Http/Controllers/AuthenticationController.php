<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Models\User;
use App\Models\Student;
use Redirect,Requests,Hash,Validator,Auth;
use App\Services\Repositories\Resource\ResourceRepository;

class AuthenticationController extends Controller
{
    protected $user;
    protected $student;
	protected $request;

    function __construct(User $user,Student $student,Request $request)
    {
        $this->user = new ResourceRepository($user);
        $this->student = new ResourceRepository($student);
    	$this->request = $request; 
    }

    public function forgotTry()
    {
        $lrn = $this->request->username;
        $check = $this->user->getAll(['username' => $lrn,'type' => 'student']);
        
        if ($check->count() <= 0) {
            return Redirect::route('forgot')
                ->with([
                    'error' => 'No student found associated with this LRN'
                ]);
        }

        $email = $check->first()->email;
        $id = $check->first()->id;
        $temporary =  substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(5/strlen($x)) )),1,5);
 
        $subject = 'TEMPORARY PASSWORD - SERGIO VOTING';
        $message = 'Hi '.$check->first()->name.', Use '.$temporary.' as your temporary password. Please update your password as soon as your authenticated. thank you. ';
        $headers = 'From: Support <support@sergio-voting.com>' . PHP_EOL .
            'Reply-To: Support <support@sergio-voting.com>' . PHP_EOL .
            'X-Mailer: PHP/' . phpversion();

        $mail = mail($email, $subject, $message, $headers);
        
        if (!$mail) {
            return Redirect::route('forgot')
                ->with([
                    'error' => 'No student found associated with this LRN'
                ]);
        }

        $this->user->update($id,[
            "password" => Hash::make($temporary)
        ]);


        return Redirect::route('login')
            ->with([
                'success' => 'We have sent a temporary password to '.$email
            ]);
    }

    public function forgot()
    {
        return view('pages.auth.forgot.index')
            ->with([ 
                'title' => 'Forgot Password' 
            ]);
    }

    public function reset($id)
    {
        $student = $this->student->getById($id);
        $oldPassword = $student->default;
        $userId = $student->user_id;

        $this->user->update($userId,[
            "password" => $oldPassword
        ]);

        return Redirect::route('student')
            ->with([
                "success" => "Student password has been reset !"
            ]);
    }

    public function change()
    {
        return view('pages.password.index')
            ->with([
                'title' => 'Change Password',
                'active' => 'Change Password',
                'breadcrumbs' => [
                    'title' => 'Account',
                    'icon' => 'la la-sitemap', 
                    'main' => 'Change password'
                ]
            ]);
    }

    public function changesave()
    { 

        if(($this->request->hasFile('profile'))){
            $file = $this->request->file('profile');
            $filename = str_replace(' ', '_', $file->getClientOriginalName());
            $file->move(public_path("/uploads/profile/"), $filename);
            $path = public_path("/uploads/profile/") . $filename;

            $this->user->update(Auth::user()->id,[
                "img" => $filename
            ]);

            return Redirect::route('password')
                ->with([
                    'success' => 'Profile has been changed !'
                ]);


        } else if(isset($this->request->old) && isset($this->request->new) && isset($this->request->confirm)){ 

            if (!Hash::check($this->request->old,Auth::user()->password)) {
                return Redirect::route('password')
                    ->with([
                        "error" => "Invalid old password !"
                    ]);
            }

            if ($this->request->new != $this->request->confirm) {
                return Redirect::route('password')
                    ->with([
                        "error" => "Password did not match !"
                    ]);
            }

            $parameters = [
                'password' => Hash::make($this->request->new)
            ];

            $this->user->update(Auth::user()->id,$parameters);

            return Redirect::route('password')
                ->with([
                    'success' => 'Password has been changed !'
                ]);

        } else {
            return Redirect::route('password')
                ->with([
                    'success' => 'No changes made !'
                ]);
        }
    }

    public function student()
    { 
    	return view('pages.auth.login.index')
    		->with([ 
    			'title' => 'Student Login' 
    		]);
    }
    
    public function admin()
    { 
    	return view('pages.auth.login.admin')
    		->with([ 
    			'title' => 'Administrator Login' 
    		]);
    }

    public function studentChecker($params)
    {
        return $this->student->getCount([
            'lrn' => $params['username'],
            'user_id' => null,
            'active' => 0,
            'status' => 1
        ]);
    }

    public function verifiyStudent()
    {
        $credentials = [
            'username' => $this->request->username,
            'password' => $this->request->password,
            'type' => 'student',
            'status' => 1
        ];

        if(!Auth::attempt($credentials)){ 
            if($this->user->getCount(['username' => $this->request->username]) != 0){ 
                return Redirect::route('login')
                    ->with([
                        'error' => 'Invalid login credentials !'
                    ]); 
            } else { 
                if($this->studentChecker($credentials) != 0){

                    $student = $this->student->getAll([
                        'lrn' => $credentials['username'],
                        'user_id' => null,
                        'active' => 0,
                        'status' => 1
                    ]);

                    $new = $student->first();

                    $attributes = [
                        "name" => $new->fname. ' '.$new->mname.' '.$new->lname,
                        "username" => $new->lrn,
                        "password" => $new->default,
                        "email" => $new->email,
                        "img" => 'default.png',
                        "type" => 'student',
                        "status" => 1
                    ]; 
     

                    $this->user->create($attributes);

                    $added = $this->user->getAll($attributes)->first();

                    $this->student->update($new->id,[
                        'active' => 1,
                        'user_id' => $added->id
                    ]);


                    if(!Hash::check($this->request->password,$added->password)){
                        return Redirect::route('login')
                            ->with([
                                'error' => 'Invalid Password !'
                            ]);
                    }

                    Auth::loginUsingId($added->id);

                    return Redirect::route('dashboard')
                        ->with([
                            "success" => "Welcome ".Auth::user()->name
                        ]);

                } else {
                    return Redirect::route('login')
                        ->with([
                            'error' => 'No student found !'
                        ]); 
                }
            }
        }

        return Redirect::route('dashboard')
            ->with([  
                "success" => "Welcome ".Auth::user()->name
            ]);
    }
    
    public function verifyAdmin()
    {
        $validatData = $this->request->validate([
            'username' => 'required',
            'password' => 'required|min:4',
        ]);

        $credentials = [
            'username' => $this->request->username,
            'password' => $this->request->password,
            'type' => 'admin',
            'status' => 1,
        ];

        if(Auth::attempt($credentials)){
            return Redirect::route('dashboard')
                ->with([
                    "success" => "Welcome ".Auth::user()->name
                ]);
        }

    	return Redirect::route('admin.login')
    		->with([  
    			'error'  => 'Invalid login credentials !'
    		]);
    }

    public function logout()
    {
        $route = Auth::user()->type == 'admin' ? 'admin.login' : 'login';

        Auth::logout();

        return Redirect::route($route);
    }
}
