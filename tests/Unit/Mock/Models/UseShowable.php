<?php

namespace Tests\Unit\Mock\Models;

use App\Traits\Showable;

class UseShowable
{
	use Showable;

	public $afterGetCalled;

	/**
	 * Mock where
	 */
	public function where(string $key, string $value)
	{
		return $this;
	}

	/**
	 * Mock getRouteKeyName
	 */
	public function getRouteKeyName()
	{
		return 'id';
	}

	/**
	 * Mock firstOrFail
	 */
	public function firstOrFail()
	{
		return new UseShowable;
	}

	public function afterShow()
	{
		$this->afterGetCalled = true;
	}
}