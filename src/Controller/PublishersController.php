<?php

namespace App\Controller;

use App\Service\LibraryData;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublishersController extends AbstractController
{
    #[Route('/publisher/{id<\d+>}', name: 'app_publishers')]
    public function index($id = ''): Response
    {

        $publishers = LibraryData::getPublishers();
        $publisher = array();
        foreach ($publishers as $c) {
            if ($c['id'] == $id) {
                $publisher = $c;
            }
        }
        if (empty($id)) {
            $content = "<h2>Please,enter a publisher id</h2>";
        } elseif (empty($publisher)) {
            $content = "<h2>No publisher found with id $id</h2>";
        } else {
            $content = "
            <h2>Publisher: {$publisher['name']}</h2> 
            <ul> 
                <li><strong>Email: </strong>{$publisher['email']}</li>  
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
