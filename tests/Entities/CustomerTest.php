<?php

	namespace Rodolfo\Customers\Tests\Entities;

	use Rodolfo\Customers\Entities\Customer;

	class CustomerTest extends \PHPUnit\Framework\TestCase
	{
		public function testCustomerName()
		{
	
			$customer = new Customer;
			$customer->setNome("Customer 1");
			$this->assertEquals("Customer 1", $customer->getNome());
		}

	}