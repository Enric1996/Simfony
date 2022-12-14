<?php

namespace App\Controller;

use App\Service\ContactData;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactsController extends AbstractController
{
    #[Route('/contact/{id<\d+>}', name: 'app_contacts')]
    public function index($id=''): Response
    {
        $contacts = ContactData::getContacts();
        $contact = array();
        foreach ($contacts as $c) {
            if ($c['id'] == $id) {
                $contact = $c;
            }
        }

        if (empty($id)) {
            $content = "<h2>Please,enter a contact Id</h2>";
        } elseif (empty($contact)) {
            $content = "<h2>No contact found with id $id</h2>";
        } else {
            $phones = ContactData::getPhones();

            $contactsPhones = "";
            foreach ($phones as $phone) {
                if ($phone['idContact'] == $id) {
                    $type = $phone['type'];
                    $number = $phone['number'];
                    $contactsPhones .= "<li>$type:$number</li>\n";
                }
            }
            $content = "
    <h2>Contact: {$contact['title']} {$contact['name']} {$contact['surname']} </h2> 
    <ul> 
        <li><strong>Birth date:</strong>{$contact['birthdate']}</li> 
    <li><strong>Email: </strong>{$contact['email']}</li> 
    <li><strong>Phones:</strong> 
    <ul>$contactsPhones</ul> 
    </li> 
    </ul>";
        }

        $page = '
<!DOCTYPEhtml> 
<html> 
    <head> 
        <title>ContactsApp</title> 
        <meta charset="UTF-8"> 
        <link type="text/css"rel="stylesheet"href="/css/style.css"> 
    </head> 
    <body> 
        <h1 class="centered">My Contacts App</h1>';

        $page .= $content . "</body></html>";

        return new Response($page);
    }
}
