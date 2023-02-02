<?php

namespace App\Service;

use App\Fixtures\BooksData;
use App\Fixtures\PublishersData;

class LibraryService
{
    public function getBooks()
    {
        $allBooks = BooksData::getAllBooks();

        return $allBooks;
    }
    
    public function getBookWithIsbn(string $isbn)
    {
        $allBooks = BooksData::getAllBooks();

        foreach ($allBooks as $book) {
            //Salida temprana.
            if ($book->getIsbn() !== $isbn) {
                continue;
            }

            return $book;
        }
    }

    public function getPublisherWithId(int $id)
    {
        
        $allPublishers = PublishersData::getAllPublishers();
        
        foreach ($allPublishers as $Publisher) {
            //Salida temprana.
            if ($Publisher->getId() !== $id) {
                continue;
            }

            return $Publisher;
        }
    }

    public function getAllPublishers()
    {
        $allPublishers = PublishersData::getAllPublishers();
    
            return $allPublishers;
        }
    }
