<?php

namespace Ffbl\Bundle\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * User
 *
 * @ORM\Table(name="userrole")
 * @ORM\Entity(repositoryClass="Ffbl\Bundle\MainBundle\Entity\UserRoleRepository")
 */
class UserRole implements RoleInterface
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(name="role", type="string", length=50)
     */
    private $role;

    /**
     * @ORM\Column(name="date_added", type="date")
     */
    private $dateAdded;

    /**
     * @ORM\Column(name="datetime_added", type="datetime")
     */
    private $dateTimeAdded;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="userRoles")
     */
    private $users;
    
    public function __construct()
    {
    	$this->users = new ArrayCollection();
    }
    public function getId()
    {
    	return $this->id;
    }

    public function getName()
    {
    	return $this->name;
    }

    public function getRole()
    {
    	return $this->role;
    }

    public function getDateAdded()
    {
    	return $this->dateAdded;
    }

    public function getDateTimeAdded()
    {
    	return $this->dateTimeAdded;
    }


    public function __toString(){
        return $this->getName() . ' [' . $this->getRole() . ']';
    }

}