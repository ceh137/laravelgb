<?php declare(strict_types=1);

namespace App\Contracts;

interface ParserContract
{
    public function getParsedMaterial(string $url): array;

    public function storeParsedMaterial(array $parsedMaterial): bool;
}
