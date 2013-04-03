<?
// src/Ffbl/Bundle/MainBundle/Entity/User.php
namespace Ffbl\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * FFbl\Entity\User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Ffbl\MainBundle\Repository\UserRepository")
 */

class User implements UserInterface, \Serializable
{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\Column(GeneratedValue="AUTO")
	 */
	private $id;

	/**
	 * @ORM\Column(type=string, length=50, unique=true)
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
	 * @ORM\Column(name="first_name" type="string", length=50)
	 */
	private $firstName;

	/**
	 * @ORM\Column(name="last_name" type="string", length=50)
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

	public function __construct()
	{
		$this->salt = md5(uniqid(null, true));

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

	public function getDateAdded()
	{
		return $this->dateAdded;
	}

	public function getDateTimeAdded()
	{
		return $this->dateTimeAdded;
	}

	public function eraseCredentials()
	{

	}

	public function getRoles()
	{
		return array('ROLE_USER');
	}

	public function serialize()
	{

	}
	
	public function unserialize($serialized)
	{

	}

}