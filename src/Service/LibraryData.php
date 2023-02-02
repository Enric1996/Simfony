<?php

namespace App\Service;

class LibraryData
{
    private static $books = array ( 
        array("isbn" => "A111B3", "title" => "The Lord of the Rings", "author" => "J.R.R. Tolkien", 
        "pages" => 1536, "pub_date" => "2020-11-03", "publisher" => 1), 
        array("isbn" => "C221B6", "title" => "Factotum", "author" => " Charles Bukowski", 
        "pages" => 208, "pub_date" => "2002-03-31", "publisher" => 2), 
        array("isbn" => "A546783", "title" => "A Wizard of Earthsea", "author" => "Ursula K. Le Guin", 
        "pages" => 210, "pub_date" => "2012-09-11", "publisher" => 1), 
        array("isbn" => "F666764", "title" => "The Lathe Of Heaven", "author" => "Ursula K. Le Guin", 
        "pages" => 192, "pub_date" => "2008-04-15", "publisher" => 3), 
        array("isbn" => "66788745", "title" => "Foundation", "author" => " Isaac Asimov", 
        "pages" => 816, "pub_date" => "2022-07-07", "publisher" => 3) 
    ); 
     
    private static $publishers = array ( 
        array ("id"=> 1, "name"=>"Clarion Books", "email"=>"info@clarion. com"),
        array ("id"=> 2, "name"=>"Scribner", "email"=>"scribner@scr.com"), 
        array ("id"=> 4, "name"=>"Ecco", "email"=>"ecco_info@ecco.com")
    );

    public function getBooks(): array
    {
        return self::$books;
    }

    public function getPublishers(): array
    {
        return self::$publishers;
    }
}