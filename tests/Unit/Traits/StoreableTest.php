<?php

namespace Tests\Unit\Traits;

use PHPUnit\Framework\TestCase;
use Tests\Unit\Mock\Models\UseStoreable;

class StoreableTest extends TestCase
{
	public function testCallStoreMethod()
	{
		(new UseStoreable)->store([]);

		$this->assertTrue(true);
	}

	public function testBeforeStoreGetCalled()
	{
		$object = (new UseStoreable)->store([]);

		$this->assertTrue($object->beforeStoreCalled);
	}

	public function testAfterStoreGetCalled()
	{
		$object = (new UseStoreable)->store([]);

		$this->assertTrue($object->afterStoreCalled);
	}

	public function testFilterPayloadBeforeStore()
	{
		$object = (new UseStoreable)->store([]);

		$this->assertTrue(collect($object->payload)->get('additional', false));
	}
}
