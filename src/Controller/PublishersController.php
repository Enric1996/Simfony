<?php

namespace App\Controller;

use App\Service\LibraryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Publisher;
use Doctrine\Persistence\ManagerRegistry;
class PublishersController extends AbstractController
{
    public function __construct(private readonly LibraryService $LibraryService){
    }

    #[Route('/publisher/new/{name}/{email}', name: 'app_newPublisher', methods: ['GET'])]
    public function newBook(ManagerRegistry $doctrine, $name='', $email=''): Response
    {

        $publisher = new Publisher();
        $publisher->setName($name);
        $publisher->setEmail($email);

        $entityManager=$doctrine->getManager();
        $entityManager->persist($publisher);
        $entityManager->flush();
        
        return $this->render('Publisher/NewPublisher.html.twig', []);

    }

    #[Route('/publisher/{id}', name: 'app_publishers', methods: ['GET'])]
    public function index(ManagerRegistry $doctrine, $id): Response
    {

        $rep=$doctrine->getRepository(Publisher::class);
        $publisher = $rep->findBy(["id"=>$id]);
        $name='';
        $email='';
        if(!empty($publisher)){
            $publisher =  $publisher[0];
            $name = $publisher->getName();
            $email = $publisher->getEmail();
        }else{
            $publisher = NULL;
        }
     
       //Salida de datos.
       return $this->render('Publisher/Publisher.html.twig', [
           'controller_name' => 'Publisher',
           'publisher_with_id' => $publisher,
           'name' => $name,
           'email' => $email,
           'publisher_id' => $id,
       ]);
    }

    #[Route('/publisher', name: 'app_publisher_no_id', methods: ['GET'])]
    public function noId(): Response
    {
        return $this->render('Publisher/PublisherNoId.html.twig', ['controller_name' => 'Publisher no id',]);
    }

    #[Route('/publisher_list', name: 'publisher_list', methods: ['GET'])]
    public function publisher_list(ManagerRegistry $doctrine): Response
    {


        $rep=$doctrine->getRepository(Publisher::class);
        $publishers = $rep->findAll();
        

        return $this->render('Publisher/Publisher_list.html.twig', [
            'publishers' => $publishers,
        ]);
    }
}
