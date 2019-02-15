<?php

namespace Tests\Unit\Model;

use Tests\TestCase;
use App\CreditCard;

class CreditCardTest extends TestCase
{
	private $creditCard = null;
	
	public function setUp( )
	{
	
		$this->creditCard = new CreditCard();
	}

	public function testValidNumber()
	{
		$this->assertTrue($this->creditCard->Set('4444333322221111'));
	}
	
	public function testInvalidNumberShouldReturError()
	{
		$this->assertEquals( 'ERROR_INVALID_LENGTH', $this->creditCard->Set('3333555522221111') );
	}
	
	public function testValidNumberShouldSetAndGet()
	{
		$this->creditCard->Set('4444333322221111');
		$this->assertEquals('4444333322221111',$this->creditCard->Get());
	}
}