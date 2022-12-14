<?php

namespace App\Controller;

use App\Service\LibraryData;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BooksController extends AbstractController
{
    #[Route('/book/{isbn}', name: 'app_books')]
    public function index($isbn=''): Response
    {
      
        $books = LibraryData::getBooks();
        $book = array();
        foreach ($books as $c) {
            if ($c['isbn'] === $isbn) {
                $book = $c;
            }
        }
        if (empty($isbn)) {
            $content = "<h2>Please,enter a book isbn</h2>";
        } elseif (empty($book)) {
            $content = "<h2>No book found with isbn $isbn</h2>";
        } else {
            $content = "
            <h2>Book: {$book['title']}</h2> 
            <ul> 
                <li><strong>Author: </strong>{$book['author']}</li> 
                <li><strong>Publisher: </strong>{$book['publisher']}</li> 
                <li><strong>Publication Data: {$book['pub_date']}</strong></li>
                <li><strong>Pages: {$book['pages']}</strong></li> 
                <li><strong>ISBN: {$book['isbn']}</strong></li>  
            </ul>";
        }
        $page = '
                <!DOCTYPEhtml> 
                    <html> 
                    <head> 
                        <title>BooksApp</title> 
                        <meta charset="UTF-8">
                    </head> 
                    <body> 
                        <h1>Library App</h1>';
                         $page .= $content . "</body></html>";
        return new Response($page);
    }
}
