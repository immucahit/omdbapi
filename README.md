# OMDb API PHP 7.4 Library

```
composer require immucahit/omdbapi
```

__Request By Title__

```php
require_once './vendor/autoload.php';

use OMDBAPI\Parameters\TitleParameter;
use OMDBAPI\Type;
use OMDBAPI\Plot;
use OMDBAPI\ReturnType;
use OMDBAPI\Client;

$titleParameter = new TitleParameter();
$titleParameter->setTitle('V for Vendetta');
$titleParameter->setYear(2005);
$titleParameter->setType(Type::MOVIE);
$titleParameter->setPlot(Plot::SHORT);
$titleParameter->setReturnType(ReturnType::JSON);

$url = 'http://www.omdbapi.com/';
$apiKey = 'API_KEY';

$client = new Client($url,$apiKey);

$jsonResult = $client->requestByTitleParameter($titleParameter);
```

__Request By ID__

```php
require_once './vendor/autoload.php';

use OMDBAPI\Parameters\IDParameter;
use OMDBAPI\Plot;
use OMDBAPI\ReturnType;
use OMDBAPI\Client;

$idParameter = new IDParameter();
$idParameter->setId('tt0434409');
$idParameter->setReturnType(ReturnType::JSON);
$idParameter->setPlot(Plot::SHORT);

$url = 'http://www.omdbapi.com/';
$apiKey = 'API_KEY';

$client = new Client($url,$apiKey);

$jsonResult = $client->requestByIDParameter($idParameter);
```

__Search__

```php
require_once './vendor/autoload.php';

use OMDBAPI\Parameters\SearchParameter;
use OMDBAPI\Type;
use OMDBAPI\ReturnType;
use OMDBAPI\Client;

$searchParameter = new SearchParameter();
$searchParameter->setType(Type::MOVIE);
$searchParameter->setReturnType(ReturnType::JSON);
$searchParameter->setKeyword('avengers');

$url = 'http://www.omdbapi.com/';
$apiKey = 'API_KEY';

$client = new Client($url,$apiKey);

$jsonResult = $client->search($searchParameter);
```