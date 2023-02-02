<?php

namespace App\Controller;

use App\Service\ContactService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    
    public function __construct(private readonly ContactService $contactService)
    {
    }

    #[Route('test/publisher/{id}', name: 'app_test', methods: ['GET'])]
    public function index(int $id): Response
    {
        //Entrada de datos. ( El procesamiento lo hace el service )
        $contactWithPhones = $this->contactService->getContactWithPhones($id);

        //Salida de datos.
        return $this->render('test/Test.html.twig', [
            'controller_name' => 'Test',
            'contact_with_phones' => $contactWithPhones,
            'contact_id' => $id,
        ]);
    }

    #[Route('test/publisher/', name: 'app_test_no_id', methods: ['GET'])]
    public function noId(): Response
    {
        return $this->render('test/TestNoId.html.twig', ['controller_name' => 'Test no id',]);
    }
}