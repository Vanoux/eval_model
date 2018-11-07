<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Posts;

class AlumnisController extends AbstractController
{
    /**
     * @Route("/alumnis", name="alumnis")
     */
//Page aide moi
    public function indexAction()
    {
        //Apel Doctrine Pour selectionner les données de la class / table Posts
        $repo = $this->getDoctrine()->getRepository(Posts::class); 

        $posts = $repo->findAll(); // trouve tout les posts
        return $this->render('alumnis/index.html.twig', [
            'controller_name' => 'AlumnisController',
            'posts'=> $posts
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('alumnis/home.html.twig');
    }

    /**
     * @Route("/alumnis/{id}", name="help_show")
     */
    public function show($id)
    {
        $repo = $this->getDoctrine()->getRepository(Posts::class);
        
        $post =$repo->find($id);

        return $this->render('alumnis/show.html.twig',[
            'post' => $post
        ]);
    }
}
