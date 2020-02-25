<?php 

namespace App\Services\Repositories\Resource;
 
use Illuminate\Database\Eloquent\Model; 
use App\Services\Repositories\Resource\ResourceInterface; 

class ResourceRepository implements ResourceInterface
{
	
	protected $model; 

	function __construct(Model $model)
	{
		$this->model = $model; 
	}

	public function getById($id){
		return $this->model->find($id) ? $this->model->find($id) : 0;
	}

	public function getAll($parameters = null,$unique = null)
	{
		if(is_null($parameters)){
			return $this->model->whereStatus(1)->get();	
		}
 
		if (is_null($unique)) {
			return $this->model->where(function($query) use($parameters){
				foreach ($parameters as $key => $row) {
					return $query->where($key,'=',$row);
				}
	  		})->whereStatus(1)->get();
	  	} else {
			return $this->model->where(function($query) use($parameters){
				foreach ($parameters as $key => $row) {
					return $query->where($key,'=',$row);
				}
	  		})->whereStatus(1)->where('id','!=',$unique)->get();
	  	}
	} 

	public function getCount($parameters = null,$unique = null)
	{
		return $this->getAll($parameters,$unique) == false ? 0 : $this->getAll($parameters,$unique)->count(); 
	} 

	public function create(array $attributes)
	{ 	
        try{ 

			if($this->model->create($attributes)){
				return 1;
			} 

			return 0;

        } catch (\Illuminate\Database\QueryException $e){ 
        	return $e;
        } 
	}

	public function update($id,array $attributes)
	{
		$resource = $this->model->find($id); 
		
		if (!$resource) {
			return 0;
		}   

        try{ 

			if($resource->update($attributes)){
				return 1;
			} 

			return 0;

        } catch (\Illuminate\Database\QueryException $e){ 
        	return $e;
        } 
	}

	public function delete($id)
	{

		return $this->update($id,[ 'status' => 0 ]);

	}
}