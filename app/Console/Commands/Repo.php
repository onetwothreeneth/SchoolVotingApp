<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Repo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repo {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = ucfirst($this->arguments()['name']);
        $repoName = $name.'Repository'; 
        $intName = $name.'Interface'; 

        if (!file_exists('app/Repositories')) {
            mkdir('app/Repositories'); 
        }

        if (!file_exists('app/Contracts')) {
            mkdir('app/Contracts'); 
        }

        if (!file_exists('app/Model')) {
            mkdir('app/Model'); 
        }
 
            $file = fopen('app/Repositories/'.$repoName.'.php', 'w+');

            $data = '<?php';
            $data .= PHP_EOL;  
            $data .= PHP_EOL;  
            $data .= str_replace('/', '','namespace App\Repositories;'); 
            $data .= PHP_EOL;   
            $data .= PHP_EOL;   
            $data .= str_replace('/', '',"use App\Contracts\/$intName;");
            $data .= PHP_EOL;    
            $data .= str_replace('/', '',"use App\Repositories\/ResourceRepository;");
            $data .= PHP_EOL;   
            $data .= PHP_EOL;   
            $data .= "class $repoName extends ResourceRepository implements $intName";   
            $data .= PHP_EOL;      
            $data .= '{';   
            $data .= PHP_EOL;   
            $data .= '    protected $model;';   
            $data .= PHP_EOL;   
            $data .= '    protected $max;';   
            $data .= PHP_EOL;   
            $data .= PHP_EOL;   
            $data .= '    public function __construct(Model $model)';   
            $data .= PHP_EOL;   
            $data .= '    {';   
            $data .= PHP_EOL;   
            $data .= '        $this->model = $model;';   
            $data .= PHP_EOL;    
            $data .= '        $this->max = 10;';   
            $data .= PHP_EOL;   
            $data .= '    }';   
            $data .= PHP_EOL;   
            $data .= PHP_EOL;   
            $data .= '}';   
  
            fwrite($file,$data); 


 
            $file = fopen('app/Contracts/'.$intName.'.php', 'w+');

            $data = '<?php';
            $data .= PHP_EOL;  
            $data .= PHP_EOL;  
            $data .= str_replace('/', '','namespace App\Contracts;'); 
            $data .= PHP_EOL;     
            $data .= PHP_EOL;   
            $data .= "class $intName";   
            $data .= PHP_EOL;      
            $data .= '{';   
            $data .= PHP_EOL;    
            $data .= PHP_EOL;   
            $data .= '}';   
  
            fwrite($file,$data); 

 
            $file = fopen('app/Model/'.$name.'.php', 'w+');

            $data = '<?php';
            $data .= PHP_EOL;  
            $data .= PHP_EOL;  
            $data .= str_replace('/', '','namespace App\Models;'); 
            $data .= PHP_EOL;  
            $data .= PHP_EOL;  
            $data .= "use Illuminate\Database\Eloquent\Model;"; 
            $data .= PHP_EOL;    
            $data .= PHP_EOL;   
            $data .= "class $name extends Model";   
            $data .= PHP_EOL;      
            $data .= '{';   
            $data .= PHP_EOL;   
            $data .= PHP_EOL;       
            $data .= '    protected $table = "'.strtolower($name).'s";';   
            $data .= PHP_EOL;       
            $data .= PHP_EOL;    
            $data .= '    protected $fillable = [];';    
            $data .= PHP_EOL;      
            $data .= PHP_EOL;    
            $data .= '    protected $casts = [];';   
            $data .= PHP_EOL;    
            $data .= PHP_EOL;   
            $data .= '}';   
  
            fwrite($file,$data); 


    }
}
