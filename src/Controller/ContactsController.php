<?php

namespace App\Controller;

use App\Service\ContactService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactsController extends AbstractController
{

    public function __construct(private readonly ContactService $ContactService){
    }

    #[Route('/contact/{id}', name: 'app_contacts', methods: ['GET'])]
    public function index($id): Response
    {
       //Entrada de datos. ( El procesamiento lo hace el service )
       $contactWithPhones = $this->ContactService->getContactWithPhones($id);

       //Salida de datos.
       return $this->render('Contacts/Contacts.html.twig', [
           'controller_name' => 'Contacts',
           'contact_with_phones' => $contactWithPhones,
           'contact_id' => $id,
       ]);
    }

    #[Route('/contact', name: 'app_contact_no_id', methods: ['GET'])]
    public function noId(): Response
    {
        return $this->render('Contacts/ContactsNoId.html.twig', ['controller_name' => 'Contacts no id',]);
    }
}
