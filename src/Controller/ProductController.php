<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produit;
use  Doctrine\ORM\EntityManagerInterface ;
use Symfony\Flex\Response;

class ProductController extends AbstractController
{
    protected $objectManager;
    public $produit;

    public function __construct(EntityManagerInterface  $objectManager){
        $this->objectManager = $objectManager;
    }

    /**
     * @Route("/product", name="product")
     */
    public function index()
    {
        $produit = $this->createProduit();

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'produit'=>$produit
        ]);
    }

    /**
     * @Route("/product", name="create_product")
     */
    public function createProduit(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        //$entityManager = $this->getDoctrine()->getManager();

        $produit = new Produit();
        $produit->setLibelle('Keyboard');
        $produit->setPrix(1999);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $this->objectManager->persist($produit);

        // actually executes the queries (i.e. the INSERT query)
        $this->objectManager->flush();

        return new Response('Saved new product with id '.$produit->getId());
    }
}
