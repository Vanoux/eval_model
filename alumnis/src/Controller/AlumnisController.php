<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Posts;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\DBAL\Types\TextType;
use Doctrine\DBAL\Types\DateType;

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
//Page accueil
    public function home()
    {
        return $this->render('alumnis/home.html.twig');
    }


    /**
     * @Route("/alumnis/new", name="alumnis_create")
     */
//Page pour créer un post (avec un form objet de symfony)
    public function create(Request $request, ObjectManager $manager)
    {
        $article = new Posts();

        $form = $this->createFormBuilder($article)
                        ->add('titre')
                        ->add('contenu')
                        ->add('date')
                        ->getForm();

        $form->handleRequest($request);

        //dump($article);

        if($form->isSubmitted() && $form->isValid()) {
            //$article->setCreatedAt(new \DateTime());
            $manager->persist($article);
            $manager->flush();

            return $this->redirectToRoute('help_show', [
                'id' => $article->getId()
            ]);
        }


        return $this->render('alumnis/create.html.twig',[
            'formPost' => $form->createView() //affichage de l'objet form
        ]);
    }


    /**
     * @Route("/alumnis/{id}", name="help_show")
     */
//Page montrer un post
    public function show($id)
    {
        $repo = $this->getDoctrine()->getRepository(Posts::class);
        
        $post =$repo->find($id);

        return $this->render('alumnis/show.html.twig',[
            'post' => $post
        ]);
    }

}
