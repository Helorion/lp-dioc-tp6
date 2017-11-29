<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * class ArticleStat
 * @ORM\Entity
 */
class ArticleStat
{
    /**
     * @ORM\Column()
     */
    const CREATE = 'create';
    /**
     * @ORM\Column()
     */
    const UPDATE = 'update';
    /**
     * @ORM\Column()
     */
    const VIEW = 'view';

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column()
     */
    private $action;

    /**
     * @ORM\OnetoOne(targetEntity="Article")
     */
    private $article;
    /**
     * @ORM\Column(type="datetime")
     */
    private $date;
    /**
     * @ORM\Column()
     */
    private $ip;

    /**
     * @ORM\OneToOne(targetEntity="User")
     */
    private $user;

    /**
     * ArticleStat constructor.
     * @param $action
     * @param $article
     * @param $date
     * @param $ip
     * @param $user
     */
    public function __construct($action, $article, $date, $ip, $user)
    {
        $this->action = $action;
        $this->article = $article;
        $this->date = $date;
        $this->ip = $ip;
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }



    // Uniquement des getter et un constructeur
}
