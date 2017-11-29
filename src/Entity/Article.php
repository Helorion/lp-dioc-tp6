<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * class Article
 * @ORM\Entity
 */
class Article
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column()
     */
    private $title;
    /**
     * @ORM\Column()
     */
    private $slug;
    /**
     * @ORM\Column()
     */
    private $content;
    /**
     * @ORM\ManyToOne(targetEntity="user", mappedBy="articles")
     */
    private $author;

    /**
     * @ORM\Column(type="Integer")
     */
    private $countView = 0;

    /**
     * @ORM\ManyToMany(targetEntity="Tag")
     */
    private $tags;
    /**
     * @ORM\Column(type="datetime", name="update_at")
     */
    private $updatedAt;
    /**
    * @ORM\Column(type="datetime", name="created_at")
    */
    private $createdAt;
}
