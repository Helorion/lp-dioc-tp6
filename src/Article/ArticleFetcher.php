<?php

namespace App\Article;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Registry;

class ArticleFetcher
{
    public $registry;
    public $limit;

    /**
     * ArticleFetcher constructor.
     * @param $registry
     */
    public function __construct(Registry $registry, $limit)
    {
        $this->registry = $registry;
        $this->limit=$limit;

    }


    public function fetch() : array
    {
        // Retourne les 10 derniers articles.
        // La limit (ici 10) doit provenir d'une variable d'env.

        $repos = $this->registry->getRepository(Article::class);
        $repos->findBy(array(),array('updatedat'=>"DESC"), $this->limit);


        return [];
    }
}
