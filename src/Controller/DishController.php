<?php

namespace App\Controller;

use App\Entity\Dishes;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/dish", name="app_dish.")
     */
class DishController extends AbstractController
{
    /**
     * @Route("/", name="dish")
     */
    public function index(): Response
    {
        return $this->render('dish/index.html.twig', [
            'controller_name' => 'DishController', 
        ]);
    }

     /**
     * @Route("/create", name="create")
     */
    public function create(Request $request){
        $dishes = new Dishes();
        $dishes->setName('Pizza');

        //Entity Manager
        $em = $this->getDoctrine()->getManager();
        $em->persist($dishes);
        $em->flush();

        //Response
        return new Response('Dish has been created');
    }
}
