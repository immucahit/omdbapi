# OMDb API Library

```
composer require immucahit/omdbapi
```

__Request By Title__

```php
require_once './vendor/autoload.php';

use OMDBAPI\Parameters\TitleParameter;
use OMDBAPI\Type;
use OMDBAPI\Plot;
use OMDBAPI\Client;
use OMDBAPI\Models\Model;

$titleParameter = new TitleParameter();
$titleParameter->setTitle('V for Vendetta');
$titleParameter->setYear(2005);
$titleParameter->setType(Type::MOVIE);
$titleParameter->setPlot(Plot::SHORT);

$url = 'http://www.omdbapi.com/';
$apiKey = 'API_KEY';

$client = new Client($url,$apiKey);

$arrayResult = $client->get($titleParameter);
$model = new Model($arrayResult);
```

__Request By ID__

```php
require_once './vendor/autoload.php';

use OMDBAPI\Parameters\IDParameter;
use OMDBAPI\Plot;
use OMDBAPI\Client;

$idParameter = new IDParameter();
$idParameter->setId('tt0434409');
$idParameter->setPlot(Plot::SHORT);

$url = 'http://www.omdbapi.com/';
$apiKey = 'API_KEY';

$client = new Client($url,$apiKey);

$arrayResult = $client->get($idParameter);
$model = new Model($arrayResult);
```

__Search__

```php
require_once './vendor/autoload.php';

use OMDBAPI\Parameters\SearchParameter;
use OMDBAPI\Type;
use OMDBAPI\Client;

$searchParameter = new SearchParameter();
$searchParameter->setType(Type::MOVIE);
$searchParameter->setKeyword('avengers');

$url = 'http://www.omdbapi.com/';
$apiKey = 'API_KEY';

$client = new Client($url,$apiKey);

$arrayResult = $client->get($searchParameter);
```