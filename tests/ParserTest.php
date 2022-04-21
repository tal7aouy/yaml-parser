<?php

declare(strict_types=1);

use Tal7aouy\YamlParser\Exceptions\ParserException;
use Tal7aouy\YamlParser\Parser;

beforeEach(
    fn () =>
    $this->parser = new Parser(
        file: __DIR__ . '/Fixtures/openapi.yaml',
    ),
);

it('can create a new parser', function () {
    expect(
        $this->parser,
    )->toBeInstanceOf(Parser::class);
});

it('can get the file being passed to the parser', function () {
    expect(
        $this->parser->file(),
    )->toEqual(__DIR__ . '/Fixtures/openapi.yaml');
});

it('can parse the file passed in', function () {
    expect(
        $this->parser->raw()
    )->toBeArray()->toContain(
        'trello.com'
    );
});

it('can boot the parser', function () {
    expect(
        $this->parser->contents()
    )->toBeArray()->toEqual([]);

    $this->parser->boot();

    expect(
        $this->parser->contents()
    )->toBeArray()->toContain(
        'trello.com'
    );
});

it('can get an item from the parser', function () {
    $this->parser->boot();

    expect(
        $this->parser->get(
            key: 'host',
        )
    )->toBeString()->toEqual('trello.com');
});

it('throws an exception if the key can\'t be found in the open api file', function (string $string) {
    $this->parser->boot();

    $this->parser->get(
        key: $string,
    );
})->throws(ParserException::class)->with('strings');

it('can get the api paths', function () {
    $this->parser->boot();

    expect(
        $this->parser->paths(),
    )->toBeArray();
});
