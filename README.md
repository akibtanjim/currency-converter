# Laravel Currency Converter

This package is built for laravel with a view to get the currency rates and convert single and multiple currency to another currency. This uses https://openexchangerates.org for fetching rates. This package supports 170 currencies.

There are 4 types of plan in open exchange rate. By using free plan and it's api key one would only be able to get rates/convert currency based on USD. So the suggestion is to use any of other 3 plan and it's api key.  

## Installation

Install using composer:
```

composer require akibtanjim/currency-converter:dev-master

```

In Laravel 5.5 or higher, this package will be automatically discovered and you can safely skip the following two steps.

If using Laravel 5.4 or lower, after updating composer, add the ServiceProvider to the providers array in ```config/app.php```

In the **providers** section add the below line:

```

  AkibTanjim\Currency\CurrencyServiceProvider::class,

```
add the Alias to **aliases** section of config/app.php:

```

  'Currency'=> AkibTanjim\Currency\Facades\CurrencyConverter::class,

```

### Example

Open command prompt and wrtie the following command:

```

  php artisan make:controller ExampleController

```
Now paste the following code:

```

  <?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use Currency;

  class ExampleController extends Controller
  {
      public function rates(){
        $response = Currency::getRates();
        return response()->json($response);
      }

      public function single(){
        $response = Currency::convert('USD','BDT',10);
        return response()->json($response);
      }

      public function multiple(){
        $response = Currency::convert('USD',['BDT','JPY','AUD'],10);
        return response()->json($response);
      }
  }

```
In your ```routes/web.php``` paste the following code.
```
  Route::get('/rates', 'ExampleController@rates');
  Route::get('/convert/single', 'ExampleController@single');
  Route::get('/convert/multiple', 'ExampleController@multiple');
  
```
Now open your ```.env``` file and paste the follwing code:
```
  OPEN_EXCHANGE_RATES_API_KEY=YOUER_API_KEY
  BASE_CURRENCY=YOUR_BASE_CURRENCY
  CURRENCY_CACHE=60 //in minutes
```
Open command prompt and run:
```
  php artisan serve
```
**Sample Response of Getting Rates** (http://127.0.0.1:8000/rates)
```
  {
    "disclaimer": "Usage subject to terms: https://openexchangerates.org/terms",
    "license": "https://openexchangerates.org/license",
    "timestamp": 1534168800,
    "base": "USD",
    "rates": {
        "AED": 3.673281,
        "AFN": 72.750697,
        "ALL": 110,
        "AMD": 483.677012,
        "ANG": 1.845258,
        "AOA": 259.713,
        "ARS": 29.741,
        "AUD": 1.371765,
        "AWG": 1.790997,
        "AZN": 1.7025,
        "BAM": 1.71906,
        "BBD": 2,
        "BDT": 84.512765,
        "BGN": 1.711176,
        "BHD": 0.37715,
        "BIF": 1769.079915,
        "BMD": 1,
        "BND": 1.510575,
        "BOB": 6.910984,
        "BRL": 3.897481,
        "BSD": 1,
        "BTC": 0.000155984278,
        "BTN": 69.858077,
        "BWP": 10.731499,
        "BYN": 2.069305,
        "BZD": 2.010247,
        "CAD": 1.312688,
        "CDF": 1643.206404,
        "CHF": 0.994051,
        "CLF": 0.02338,
        "CLP": 658.6,
        "CNH": 6.882843,
        "CNY": 6.8822,
        "COP": 2944.01,
        "CRC": 567.429386,
        "CUC": 1,
        "CUP": 25.5,
        "CVE": 97.1825,
        "CZK": 22.473,
        "DJF": 178.025,
        "DKK": 6.522392,
        "DOP": 49.745,
        "DZD": 118.825968,
        "EGP": 17.9,
        "ERN": 15.000033,
        "ETB": 27.571225,
        "EUR": 0.874989,
        "FJD": 2.110003,
        "FKP": 0.782261,
        "GBP": 0.782261,
        "GEL": 2.44699,
        "GGP": 0.782261,
        "GHS": 4.82,
        "GIP": 0.782261,
        "GMD": 48.045,
        "GNF": 9090,
        "GTQ": 7.494678,
        "GYD": 209.014372,
        "HKD": 7.84995,
        "HNL": 24.039989,
        "HRK": 6.4983,
        "HTG": 66.651807,
        "HUF": 283.299867,
        "IDR": 14351.176583,
        "ILS": 3.695496,
        "IMP": 0.782261,
        "INR": 69.907,
        "IQD": 1190,
        "IRR": 43163.885347,
        "ISK": 108.68999,
        "JEP": 0.782261,
        "JMD": 135.420386,
        "JOD": 0.709506,
        "JPY": 110.91814286,
        "KES": 100.73,
        "KGS": 68.137481,
        "KHR": 4072,
        "KMF": 432.2,
        "KPW": 900,
        "KRW": 1132.36,
        "KWD": 0.303401,
        "KYD": 0.833503,
        "KZT": 363.983169,
        "LAK": 8500,
        "LBP": 1510.15,
        "LKR": 160.01,
        "LRD": 153.3,
        "LSL": 14.07,
        "LYD": 1.39,
        "MAD": 9.53,
        "MDL": 16.539963,
        "MGA": 3332.968099,
        "MKD": 53.875,
        "MMK": 1481.741948,
        "MNT": 2442.166667,
        "MOP": 8.086545,
        "MRO": 356.5,
        "MRU": 35.96,
        "MUR": 34.917484,
        "MVR": 15.41,
        "MWK": 727.128173,
        "MXN": 19.153628,
        "MYR": 4.094503,
        "MZN": 57.849493,
        "NAD": 14.07,
        "NGN": 361,
        "NIO": 31.899707,
        "NOK": 8.348457,
        "NPR": 111.775893,
        "NZD": 1.517863,
        "OMR": 0.384969,
        "PAB": 1,
        "PEN": 3.278826,
        "PGK": 3.313739,
        "PHP": 53.352,
        "PKR": 123.9,
        "PLN": 3.760051,
        "PYG": 5752.858784,
        "QAR": 3.641259,
        "RON": 4.077001,
        "RSD": 103.212604,
        "RUB": 67.6795,
        "RWF": 865,
        "SAR": 3.750769,
        "SBD": 7.88911,
        "SCR": 13.590164,
        "SDG": 18.05,
        "SEK": 9.10389,
        "SGD": 1.374391,
        "SHP": 0.782261,
        "SLL": 6542.71,
        "SOS": 577,
        "SRD": 7.458,
        "SSP": 130.2634,
        "STD": 21050.59961,
        "STN": 21.45,
        "SVC": 8.75173,
        "SYP": 514.98999,
        "SZL": 14.08,
        "THB": 33.317,
        "TJS": 9.416471,
        "TMT": 3.499986,
        "TND": 2.7684,
        "TOP": 2.310538,
        "TRY": 6.857968,
        "TTD": 6.740925,
        "TWD": 30.809027,
        "TZS": 2281.8,
        "UAH": 27.378,
        "UGX": 3745.452787,
        "USD": 1,
        "UYU": 30.692376,
        "UZS": 7784.095548,
        "VEF": 141572.666667,
        "VND": 23114.840172,
        "VUV": 108.499605,
        "WST": 2.588533,
        "XAF": 573.955074,
        "XAG": 0.06566646,
        "XAU": 0.00083342,
        "XCD": 2.70255,
        "XDR": 0.716692,
        "XOF": 573.955074,
        "XPD": 0.00101,
        "XPF": 104.413946,
        "XPT": 0.0012323,
        "YER": 250.300682,
        "ZAR": 14.242363,
        "ZMW": 10.017,
        "ZWL": 322.355011
    }
  }

```

**Sample Response of Single Currency Conversion** (http://127.0.0.1:8000/convert/single)
```
  {
    "from": "USD",
    "to": "BDT",
    "amount": 10,
    "convertionRate": "84.51",
    "convertedAmount": "845.13"
  }

```

**Sample Response of Multiple Currency Conversion** (http://127.0.0.1:8000/convert/multiple)
```
  [
    {
      "from": "USD",
      "to": "BDT",
      "amount": 10,
      "convertionRate": "84.51",
      "convertedAmount": "845.13"
    },
    {
      "from": "USD",
      "to": "JPY",
      "amount": 10,
      "convertionRate": "110.92",
      "convertedAmount": "1109.18"
    },
    {
      "from": "USD",
      "to": "AUD",
      "amount": 10,
      "convertionRate": "1.37",
      "convertedAmount": "13.72"
    }
  ]

```
**Sample Error Response**
```
  {
    "error": true,
    "status": 403,
    "message": "not_allowed",
    "description": "Changing the API `base` currency is available for Developer, Enterprise and Unlimited plan clients. Please upgrade, or contact support@openexchangerates.org with any questions."
  }

```
For More Error info visit [here](https://docs.openexchangerates.org/docs/errors)


## Supported Currency and their shortcode


| Currency Name  					| Short Code 		|
| ----------------------------- | ----------------- |					
|UAE Dirham						|	AED              |
|Afghani						|	AFN				|
|Lek						|	ALL 				|
|Armenian Dram							|	AMD 				|
|Netherlands Antillan Guilder						|	ANG 				|
|Kwanza					|	AOA 				|
|Argentine Peso							|	ARS 				|
|Australian Dollar						|	AUD 				|
|Aruban Guilder						|	AWG 				|
|Azerbaijan Manat						|	AZN           	|
|Convertible Mark						|	BAM 				|
|Barbados Dollar						|	BBD 				|
|Taka						|	BDT |
|Bulgarian Lev			|	BGN  |
|Bahraini Dinar			|	BHD  |
|Colombian Peso						|	COP              |
|Costa Rican Colón						|	CRC 				|
|Cuban Convertible Peso							|	CUC 				|
|Cuban Peso							|	CUP  			|
|Cape Verde Escudo							|	CVE  			|
|Czech Koruna						|	CZK 				|
|Djibouti Franc						|	DJF 				|
|Faroese Króna						|	DKK 				|
|Dominican Peso						|	DOP 				|
|Algerian Dinar							|	DZD 				|
|Egyptian Pound						|	EGP 				|
|Nakfa						|	ERN 				|
|Ethiopian Birr						|	ETB 				|
|Euro							|	EUR 				|
|Fiji Dollar							|	FJD 				|
|Falkland Islands Pound						|	FKP 				|
|Pound Sterling					|	GBP 				|
|Lari							|	GEL 				|
|Guernsey Pound						|	GGP |
|Ghanaian Cedi							|	GHS 				|
|Gibraltar Pound							|	GIP 				|
|Dalasi							|	GMD |
|Guinea Franc						|	GNF 				|
|Quetzal						|	GTQ 				|
|Guyana Dollar							|	GYD 				|
|Hong Kong Dollar						|	HKD 				|
|Lempira							|	HNL 				|
|Croatian Kuna						|	HRK 				|
|Haitian Gourde						|	HTG 				|
|Forint						|	HUF 				|
|Rupiah						|	IDR 				|
|New Israeli Sheqel							|	ILS 				|
|Isle of Man Pound							|	IMP 				|
|Indian Rupee							|	INR 				|
|Iraqi Dinar						|	IQD 				|
|Iranian Rial							|	IRR 				|
|Iceland Krona							|	ISK 				|
|Moroccan Dirham						|	MAD 				|
|Moldovan Leu						|	MDL 				|
|Malagasy ariary						|	MGA 				|
|Macedonian Denar					|	MKD 				|
|Kyat						|	MMK 				|
|Tugrik						|	MNT 				|
|Macanese Pataca 							|	MOP 				|
|Ouguiya						|	MRO 				|
|Mauritanian Ouguiya						|	MRU 				|
|Mauritius Rupee							|	MUR 				|
|Rufiyaa						|	MVR 				|
|Kwacha						|	MWK 				|
|Mexican Peso				|	MXN 				|
|Malaysian Ringgit							|	MYR 				|
|Mozambican Metical						|	MZN 				|
|Namibia Dollar				|	NAD 				|
|Naira							|	NGN 				|
|Cordoba Oro						|	NIO 				|
|Norwegian Krone							|	NOK 				|
|Nepalese Rupee	|	NPR 				|
|New Zealand Dollar						|	NZD 				| 						
|Rial Omani						|	OMR 				|
|Balboa						|	PAB 				|
|Nuevo Sol							|	PEN 				|
|Kina					|	PGK 				|
|Philippine Peso						|	PHP 				|
|Pakistan Rupee						|	PKR 				|
|Zloty							|	PLN 				|
|Guarani							|	PYG 				|
|Qatari Rial			|	QAR 				|
|Romanian leu							|	RON 				|
|Serbian Dinar						|	RSD 				|
|Russian Ruble							|	RUB 				|
|Rwanda Franc						|	RWF 				|
|Saudi Riyal						|	SAR 				|
|Solomon Islands Dollar						|	SBD 				|
|Seychelles Rupee						|	SCR 				|
|Sudanese Dinar				|	SDG 				|
|Swedish Krona							|	SEK 				|
|Singapore Dollar							|	SGD 				|
|Saint Helena Pound							|	SHP 				|
|Leone							|	SLL 				|
|Somali Shilling						|	SOS 				|
|Surinamese Dollar						|	SRD 				|
|Urdu							|	SSP 				|
|Dobra							|	STD 				|
|Tomean Dobra						|	STN 				|
|Salvadoran Colón							|	SVC 				|
|Syrian Pound							|	SYP 				|
|Lilangeni						|	SZL 				|
|Thai Baht							|	THB 				|
|Somoni							|	TJS 				|
|Turkmenistani Manat       | TMT         |
|Tunisian Dinar              | TND         |
|Paʻanga              | TOP         |
|Yeni Türk Liras             | TRY         |
|Trinidad and Tobago Dollar             | TTD         |
|New Taiwan Dollar            | TWD         |
|Tanzanian Shilling            | TZS         |
|Hryvnia             | UAH         |
|Uganda Shilling              | UGX         |
|US Dollar           | USD         |
|Peso Uruguayo              | UYU         |
|Uzbekistan Sum              | UZS         |
|Venezuelan Bolívar            | VEF         |
|Vietnamese Dong             | VND         |
|Vatu             | VUV         |
|Samoan Tala       | WST         |
|Central Africa CFA franc              | XAF         |
|Silver (troy ounce)              | XAG         |
|Gold (troy ounce)             | XAU         |
|East Caribbean Dollar             | XCD         |
|Special Drawing Rights            | XDR         |
|West African CFA franc            | XOF         |
|Palladium Ounce             | XPD         |
|CFP Franc              | XPF         |
|Platinum Ounce           | XPT         |
|Yemeni Rial              | YER         |
|Rand              | ZAR         |
|Zambian Kwacha            | ZMW         |
|Zimbabwean Dollar             | ZWL         |

## Authors

* **Akib Tanjim** - [akibtanjim](https://github.com/akibtanjim)
* **Alveee** - [Alveee](https://github.com/Alveee)
