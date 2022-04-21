# YAML Parser

This package is a parser for YAML openapi specifications. It allows you to parse the file and get aspects of it using utility helpers.

## Installation

You can install this package using composer:

```bash
composer require tal7aouy/yaml-parser
```

## Usage

```php
use Tal7aouy\YamlParser\Parser;

$parser = new Parser(
    file: __DIR__ . '/reference/openapi.yaml',
);

$parser->boot(); // Boot the parser

$parser->contents(); // Get the array values of the specification
$parser->raw(); // Get the raw array of content in the file
$parser->get('key'); // Get an item from the specification based on a key
$parser->paths(); // Get the API paths
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security

If you've found a bug regarding security please mail [tal7aouy@gmail.com](mailto:tal7aouy@gmail.com) instead of using the issue tracker.

## License

**_YAML Parser_** built under MIT License (MIT).
