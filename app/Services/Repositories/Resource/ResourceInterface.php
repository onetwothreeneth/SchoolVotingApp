<?php 

namespace App\Services\Repositories\Resource; 

interface ResourceInterface {

	public function getById($id);
	
	public function getAll(array $parameters,array $unique);

	public function getCount(array $parameter,array $unique);

	public function create(array $attributes);

	public function update($id,array $attributes);

	public function delete($id);

}