<?php

namespace App\Models;

class Book
{
    public function __construct(
        private readonly string $isbn,
        private readonly string $title,
        private readonly string $author,
        private readonly int $pages,
        private readonly string $pub_date,
        private readonly int $publisher,
    ) {
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getPages(): int
    {
        return $this->pages;
    }

    public function getPub_date(): string
    {
        return $this->pub_date;
    }

    public function getPublisher(): int
    {
        return $this->publisher;
    }
}