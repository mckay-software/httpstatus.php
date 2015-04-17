# HttpStatus.php

_Class constants for HTTP statuses._

## Install

Add it to your composer.json:

```json
"mckay/httpstatus": "^1.0.4",
```

then run `$ composer update`.

## Usage

```php
use \McKay\HttpStatus;

if (!$user->isRoot()) {
	renderView(...);
	HttpStatus::set(HttpStatus::UNAUTHORIZED);
	return;
}

if (empty($resource)) {
	renderError(...);
	HttpStatus::set(HttpStatus::NOT_FOUND);
	return;
}

function renderError(...) {
	$code = HttpStatus::get();
	$description = HttpStatus::text();
	...
}
```

See [the source](https://github.com/mckay-software/httpstatus.php/blob/src/HttpStatus.php)
for the complete list of available HTTP status constants.

## License

Copyright © McKay Software  
MIT License  
http://mckay.mit-license.org
