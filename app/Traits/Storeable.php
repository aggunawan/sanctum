<?php

namespace App\Traits;

trait Storeable
{
	/**
	 * Store operation for class that use this traits
	 * 
	 * @param  array  $payload
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function store(array $payload)
	{
		$filteredPayload = $this->filterStorePayload($payload);
		$className = get_class($this);

		$storedObject = new $className($filteredPayload);
		$storedObject->beforeStore();
		$storedObject->save();
		$storedObject->afterStore();

		return $storedObject;
	}

	/**
	 * Do something to given payload befor computed
	 * 
	 * @param  array  $payload
	 * @return array
	 */
	public function filterStorePayload(array $payload)
	{
		return collect($payload)->filter()->all();
	}

	/**
	 * Do something before create() method get called
	 * 
	 * @return void
	 */
	public function beforeStore()
	{
		// 
	}

	/**
	 * Do Something after create() method is called
	 * 
	 * @return void
	 */
	public function afterStore()
	{
		// 
	}
}