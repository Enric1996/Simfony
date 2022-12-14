<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainPageController extends AbstractController
{
    #[Route('/',name:'app_main_page')]
    public function index(): Response 
    { 
        $content = '
        <html> 
            <head> 
                <title>ContactsApp</title> 
                <meta charset="UTF-8"> 
                <link type="text/css" rel="stylesheet" href="/css/style.css"> 
            </head> 
            <body> 
                <h1 class="centered">Library App</h1> 
                <p class="centered">Welcome to my library App</p> 
                <p class="centered">Try to search a <a href="/book"> book</a> by its isbn</p>
                <p class="centered">Or you can search <a href="/publisher"> publisher</a> by its ID</p> 
            </body> 
        </html> 
        ';

        return new Response($content);
    }
}
