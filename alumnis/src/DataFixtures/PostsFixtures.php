<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Posts;

class PostsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        for($i = 1; $i <= 10; $i++){
            $posts = new Posts();
            $posts->setTitre("Post Aide moi ! n°$i")
                    ->setContenu("Aide moi n°$i : Grosse galère! Au secours!! Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae, ea harum tempora quidem consequatur pariatur ratione consequuntur tenetur eos sit fugit quos, vitae neque quisquam dicta, illo accusantium deleniti possimus.Beatae, ea harum tempora quidem consequatur pariatur ratione consequuntur tenetur eos sit fugit quos, vitae neque quisquam dicta, illo accusantium deleniti possimus.")
                    ->setDate(new \DateTime());
        
        //Préparation du manager pour faire persister/exister les posts dans la bdd
        $manager->persist($posts);
        }
        //Fonction flush excécute la requête sql pour mettre en place dans la bdd
        $manager->flush();
    }
}
