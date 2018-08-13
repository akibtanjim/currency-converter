<?php 
namespace AkibTanjim\Currency;

use Cache;
use Curl;

class Currency {
	private static $rates;
	public static function getRates($baseCurrency=null,$internalCall=false){
		if(!$internalCall){
			$baseCurrency = config('currency.base_currency');
			$currencyCache = config('currency.currency_cache');
			$data = Cache::remember('currency_rates_list', $currencyCache, function() use ($baseCurrency) {
					$response = Curl::to('https://openexchangerates.org/api/latest.json?app_id='.env('OPEN_EXCHANGE_RATES_API_KEY').'&base='.$baseCurrency)
							        ->asJson()
							        ->get();
					return $response;
		    });
		    return  $data;
		} else {
			$response = Curl::to('https://openexchangerates.org/api/latest.json?app_id='.env('OPEN_EXCHANGE_RATES_API_KEY').'&base='.$baseCurrency)
							        ->asJson()
							        ->get();
			return $response;
		}
	}

	public static function convert($fromCurrency,$toCurrency,$amount){
		$convertedAmount = 0;
		$convertionRate = 0;
		$supportedCurrency = array("AED","AFN","ALL","AMD","ANG","AOA","ARS","AUD","AWG","AZN","BAM","BBD","BDT","BGN","BHD","BIF","BMD","BND","BOB","BRL","BSD","BTC","BTN","BWP","BYN","BZD","CAD","CDF","CHF","CLF","CLP","CNH","CNY","COP","CRC","CUC","CUP","CVE","CZK","DJF","DKK","DOP","DZD","EGP","ERN","ETB","EUR","FJD","FKP","GBP","GEL","GGP","GHS","GIP","GMD","GNF","GTQ","GYD","HKD","HNL","HRK","HTG","HUF","IDR","ILS","IMP","INR","IQD","IRR","ISK","JEP","JMD","JOD","JPY","KES","KGS","KHR","KMF","KPW","KRW","KWD","KYD","KZT","LAK","LBP","LKR","LRD","LSL","LYD","MAD","MDL","MGA","MKD","MMK","MNT","MOP","MRO","MRU","MUR","MVR","MWK","MXN","MYR","MZN","NAD","NGN","NIO","NOK","NPR","NZD","OMR","PAB","PEN","PGK","PHP","PKR","PLN","PYG","QAR","RON","RSD","RUB","RWF","SAR","SBD","SCR","SDG","SEK","SGD","SHP","SLL","SOS","SRD","SSP","STD","STN","SVC","SYP","SZL","THB","TJS","TMT","TND","TOP","TRY","TTD","TWD","TZS","UAH","UGX","USD","UYU","UZS","VEF","VND","VUV","WST","XAF","XAG","XAU","XCD","XDR","XOF","XPD","XPF","XPT","YER","ZAR","ZMW","ZMW");
        $ratesResponse = self::getRates($fromCurrency,true);
        if(!isset($ratesResponse->rates)) return $ratesResponse;
    	if(is_array($toCurrency)){
        	$return = array();
        	foreach ($toCurrency as $value) {
        		if(!in_array($value,$supportedCurrency)) array_push($return, ['from'=>$fromCurrency,'to'=>$value,'amount'=>$amount,"message"=>"To Currency Suported"]);
        		foreach($ratesResponse->rates as  $key=>$rate){
		        	if($key == $value) {
		        		$convertionRate  = $rate;
		        		$convertedAmount = $rate*$amount;
		        		array_push($return, ['from'=>$fromCurrency,'to'=>$value,'amount'=>$amount,'convertionRate'=>number_format($convertionRate, 2, '.', ''),'convertedAmount'=>number_format($convertedAmount, 2, '.', '')]);
		        	}
		        }
			}
			return $return;
        } else {
        	foreach($ratesResponse->rates as  $key=>$rate){
	        	if($key == $toCurrency) {
	        		$convertionRate  = $rate;
	        		$convertedAmount = $rate*$amount;
	        	}
	        }
	        if($convertionRate != 0 && $convertedAmount != 0){
        		return ['from'=>$fromCurrency,'to'=>$toCurrency,'amount'=>$amount,'convertionRate'=>number_format($convertionRate, 2, '.', ''),'convertedAmount'=>number_format($convertedAmount, 2, '.', '')];
	        } else {
	        	return ['from'=>$fromCurrency,'to'=>$toCurrency,"message"=>"To Currency Suported"];
	        }
        }
        
	}
}