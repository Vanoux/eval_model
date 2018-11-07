<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Posts;
use App\Entity\Categories;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $user
            ->setNom('Joe Barr')
            ->setMail('jb@gmail.com')
            ->setPassword('toto')
            ->setPromo('Simplon Toulouse promo 6')
            ->setCompetences('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry....')
            ->setLienGithub('https://github.com/joebarr')
            ->setLienLinkdin('https://www.linkedin.com/in/joebarr')
            ->setPortfolio('joeCv.fr'); 
        $manager->persist($user);


        // Pour créer 10 posts :
        for($i=1; $i<=10; $i++){

        $posts = new Posts(); // instancie la classe Posts = créé 1 objet ($posts)
        $posts
            ->setTitre("Post titre n° $i")
            ->setContenu('first-post : Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry....')
            ->setDate(06/11/2018)
            ->setUser('Toto');
        
        //Préparation du manager pour faire persister/exister les posts dans la bdd
        $manager->persist($posts);
        }

        //Fonction flush excécute la requête sql pour mettre en place dans la bdd
        $manager->flush();
    }
}
