<?php

namespace App\Traits;

trait Showable
{
	/**
	 * Find Object by its route key
	 * 
	 * @param  string $key
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function show(string $key)
	{
		$user = $this->where($this->getRouteKeyName(), $key)->firstOrFail();
		$user->afterShow();

		return $user;
	}

	/**
	 * Do something after Object is fetched
	 * 
	 * @return void
	 */
	public function afterShow()
	{
		// 
	}
}