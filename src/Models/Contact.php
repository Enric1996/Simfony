<?php

namespace App\Models;

class Contact
{
    public function __construct(
        private readonly int $id,
        private readonly string $title,
        private readonly string $name,
        private readonly string $surname,
        private readonly string $birthdate,
        private readonly string $email,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getBirthdate(): string
    {
        return $this->birthdate;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}