<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class User
 * @ORM\Entity
 */
class User implements UserInterface, \Serializable
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
    private $email;
    /**
     * @ORM\Column()
     */
    private $firstname;
    /**
     * @ORM\Column()
     */
    private $lastname;
    /**
     * @ORM\Column()
     */
    private $password;
    /**
     * @ORM\Column(type="boolean")
     */
    private $isAuthor = false;
    /**
     * @ORM\ManyToOne(targetEntity="Article" inversedBy="author")
     */
    private $articles;

    // Fixme

    public function getRoles()
    {
        $roles = ['ROLE_USER'];

        if ($this->isAuthor()) {
            $roles[] = 'ROLE_AUTHOR';
        }

        return $roles;
    }

    public function getSalt()
    {
        return;
    }

    public function getUsername()
    {
        return $this->email;
    }

    public function eraseCredentials()
    {
        return;
    }

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->email,
            $this->firstname,
            $this->lastname,
            $this->isAuthor,
            $this->password,
        ));
    }

    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->email,
            $this->firstname,
            $this->lastname,
            $this->isAuthor,
            $this->password,
        ) = unserialize($serialized);
    }

    public function getPassword()
    {
        return $this->password;
    }
}
