<?php

namespace Tests\Unit\Mock\Models;

use App\Traits\Storeable;

class UseStoreable
{
	use Storeable;

	public $beforeStoreCalled;
	public $afterStoreCalled;
	public $payload;

	public function __construct(array $payload = null)
	{
		$this->payload = $payload;
	}

	/**
	 * Mock save() method
	 */
	public function save()
	{
		// 
	}

	public function beforeStore()
	{
		$this->beforeStoreCalled = true;
	}

	public function afterStore()
	{
		$this->afterStoreCalled = true;
	}

	public function filterStorePayload(array $payload)
	{
		return ['additional' => true];
	}
}