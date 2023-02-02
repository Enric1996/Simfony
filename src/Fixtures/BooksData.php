<?php

namespace App\Fixtures;

use App\Models\Book;

class BooksData
{
    /**
     * @return Books[]
     */
    public static function getAllBooks(): array
    {
        return [
            1 => new Book(
                "A111B3",
                "The Lord of the Rings",
                "J.R.R. Tolkien",
                1536,
                "2020-11-03",
                1
            ),
            2 => new Book(
                "C221B6",
                "Factotum",
                " Charles Bukowski",
                208,
                "2002-03-31",
                2
            ),
            3 => new Book(
                "A546783",
                "A Wizard of Earthsea",
                "Ursula K. Le Guin",
                210,
                "2012-09-11",
                1
            ),
            4 => new Book(
                "F666764",
                "The Lathe Of Heaven",
                "Ursula K. Le Guin",
                192,
                "2008-04-15",
                3
            ),
            5 => new Book(
                "66788745",
                "Foundation",
                "Isaac Asimov",
                816,
                "2022-07-07",
                3
            )
        ];
    }
}
