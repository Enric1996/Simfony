<?php

namespace App\Models;

class Phones
{
    public function __construct(private readonly int $idContact, private readonly string $number, private readonly string $type)
    {
    }

    public function getIdContact(): int
    {
        return $this->idContact;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getType(): string
    {
        return $this->type;
    }
}