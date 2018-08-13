<?php

namespace AkibTanjim\Currency\Facades;

use Illuminate\Support\Facades\Facade;

class CurrencyConverter extends Facade {
	protected static function getFacadeAccessor(){
		return 'currency';
	}
}