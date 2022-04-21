<?php

declare(strict_types=1);

namespace Tal7aouy\YamlParser;

use Symfony\Component\Yaml\Yaml;
use Tal7aouy\YamlParser\Exceptions\ParserException;

final class Parser
{
    /**
     * @param string $file
     * @param array<string,mixed> $contents
     */
    public function __construct(
        private readonly string $file,
        private array $contents = [],
    ) {
    }

    /**
     * @return array<string,mixed>
     */
    public function raw(): array
    {
        return (array) Yaml::parseFile(
            filename: $this->file,
        );
    }

    public function boot(): void
    {
        $this->contents = $this->raw();
    }

    /**
     * @return array<string,mixed>
     * @throws ParserException
     */
    public function paths(): array
    {
        return (array) $this->get(
            key: 'paths',
        );
    }

    /**
     * @param string $key
     * @return mixed
     * @throws ParserException
     */
    public function get(string $key): mixed
    {
        if (! isset($this->contents[$key])) {
            throw new ParserException(
                message: "Failed to find key [$key] in file [$this->file]",
            );
        }

        return $this->contents[$key];
    }

    public function file(): string
    {
        return $this->file;
    }

    /**
     * @return array<string, mixed>
     */
    public function contents(): array
    {
        return $this->contents;
    }
}
