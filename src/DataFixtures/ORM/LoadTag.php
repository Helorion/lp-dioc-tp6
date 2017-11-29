<?php
/**
 * Created by PhpStorm.
 * User: alexis.delarre
 * Date: 29/11/17
 * Time: 10:33
 */

namespace App\DataFixtures\ORM;


use App\Entity\Tag;
use App\Slug\SlugGenerator;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadTag extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $slut = $this->container->get(SlugGenerator::class);
        $tags = [
            new Tag("tag1",$slut->generate("tag1")),
            new Tag("tag2",$slut->generate("tag1")),
            new Tag("tag3",$slut->generate("tag1")),
            new Tag("tag4",$slut->generate("tag1"))
        ];

        foreach($tags as $tag)
        {
            $manager->persist($tag);
        }
        $manager->flush();


    }

}