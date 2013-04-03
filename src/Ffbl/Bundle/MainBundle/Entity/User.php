<?php

namespace Ffbl\Bundle\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Ffbl\Bundle\MainBundle\Entity\UserRepository")
 */
class User implements UserInterface, AdvancedUserInterface, \Serializable
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $salt;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $password;

    /**
     * @ORM\Column(name="first_name", type="string", length=50)
     */
    private $firstName;

    /**
     * @ORM\Column(name="last_name", type="string", length=50)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $email;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(name="date_added", type="date")
     */
    private $dateAdded;

    /**
     * @ORM\Column(name="datetime_added", type="datetime")
     */
    private $dateTimeAdded;

    /**
     * @ORM\ManyToMany(targetEntity="UserRole", inversedBy="users")
     */
    private $userRoles;

    public function __construct()
    {
        $this->userRoles = new ArrayCollection();
        $this->salt = md5(uniqid(null, true));
        $this->active = true;


    }

    public function getId()
    {
        return $this->id;
    }
    public function getUsername()
    {
        return $this->username;
    }

    public function getSalt()
    {

        return $this->salt;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getActive(){
        return $this->active;
    }
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    public function getDateTimeAdded()
    {
        return $this->dateTimeAdded;
    }

    public function getUserRoles(){
        return $this->userRoles;
    }
    public function eraseCredentials()
    {

    }


    public function getRoles()
    {
        return $this->userRoles->toArray();
    }

    public function serialize()
    {
        return serialize(array($this->id));
    }
    
    public function unserialize($serialized)
    {
        list($this->id) = unserialize($serialized);
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->active;
    }
}
