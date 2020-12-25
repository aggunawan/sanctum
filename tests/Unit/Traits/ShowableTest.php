<?php

namespace Tests\Unit\Traits;

use PHPUnit\Framework\TestCase;
use Tests\Unit\Mock\Models\UseShowable;

class ShowableTest extends TestCase
{
	public function testCallShowMethod()
	{
		(new UseShowable)->show('key');

		$this->assertTrue(true);
	}

	public function testAfterShowGetCalled()
	{
		$object = (new UseShowable)->show('key');

		$this->assertTrue($object->afterGetCalled);
	}
}
