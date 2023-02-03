<?php

namespace App\Controller;

use App\Service\LibraryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;
use App\Entity\Publisher;
use Doctrine\Persistence\ManagerRegistry;
use src\Repository\BookRepository;

class BooksController extends AbstractController
{

    public function __construct(private readonly LibraryService $LibraryService){
    }

    #[Route('/book/new/{isbn}/{title}/{author}/{pages}/{pubdate}/{publisher}', name: 'app_newbook', methods: ['GET'])]
    public function newBook(ManagerRegistry $doctrine, $isbn='', $title='', $author='', $pages='', $pubdate='', $publisher=''): Response
    {

        $book = new Book();
        $book->setIsbn($isbn);
        $book->setTitle($title);
        $book->setAuthor($author);
        $book->setPages($pages);
        $book->setPubDate($pubdate);
        $book->setPublisher($publisher);

        $entityManager=$doctrine->getManager();
        $entityManager->persist($book);
        $entityManager->flush();
        
        return $this->render('Library/newBook.html.twig', []);

    }

    #[Route('/book/{isbn}', name: 'app_getBookByIsbn', methods: ['GET'])]
    public function getBookByIsbn(ManagerRegistry $doctrine, $isbn): Response
    {

        $rep=$doctrine->getRepository(Book::class);
        $book=$rep->findBy(["isbn"=>$isbn]);
        $book=  $book[0];
       
        $title = $book->getTitle();
        $author = $book->getAuthor();
        $pages = $book->getPages();
        $date = $book->getPubDate();
        $publisher = $book->getPublisher();
       
        //Salida de datos.
        return $this->render('Library/Books.html.twig', [
            'controller_name' => 'Library App', 
            'library_with_books' => $book,
            'book_isbn' => $isbn,
            'title' => $title,
            'author'=> $author,
            'pages' => $pages,
            'date' => $date,
            'publisher' => $publisher
        ]);
    }

    #[Route('/bookList', name: 'app_booksList', methods: ['GET'])]
    public function bookList(ManagerRegistry $doctrine): Response
    {

        $rep=$doctrine->getRepository(Book::class);
        $book=$rep->findAll();
    

        $repa=$doctrine->getRepository(Publisher::class);
        $publishers = $repa->findAll();

        return $this->render('Library/Books_list.html.twig', [
            'books' => $book,
            'publishers' => $publishers,
            'page_title' => 'My Library App - Books List'
        ]);
    }


    #[Route('/book/search/{title}/{author}', name: 'app_getBookByIsbn', methods: ['GET'])]
    public function getBooksByTitleAuthor(ManagerRegistry $doctrine, $title='', $author=''): Response
    {
        /** @var BookRepository $repository **/
        $repository=$doctrine->getRepository(Book::class);
        $book=$repository->findByTitleAuthor($title, $author);

        $repa=$doctrine->getRepository(Publisher::class);
        $publishers = $repa->findAll();


        if($book == NULL){
            return $this->render('Library/BooksNoIsbn.html.twig', ['controller_name' => 'Library no Results',]);
        }
        //Salida de datos.
        return $this->render('Library/Books_list.html.twig', [
            'books' => $book,
            'publishers' => $publishers,
            'page_title' => 'My Library App - Books List'
        ]);
    }

   
    #[Route('/book', name: 'app_books_no_id', methods: ['GET'])]
    public function noIsbn(): Response
    {
        return $this->render('Library/BooksNoIsbn.html.twig', ['controller_name' => 'Library no ISBN',]);
    }

}
