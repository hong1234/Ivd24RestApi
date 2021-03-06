<?php

namespace Ivd24\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="api_partner")
 * @ORM\Entity
 */
class User implements UserInterface
{
 /**
  * @ORM\Column(name="api_id", type="integer")
  * @ORM\Id
  * @ORM\GeneratedValue(strategy="AUTO")
  */
 private $id;
 /**
  * @ORM\Column(name="partnername", type="string", length=255, unique=true)
  */
 private $username;
 /**
  * @ORM\Column(name="password", type="string", length=255)
  */
 private $password;

 /**
  * @ORM\Column(name="email", type="string", length=45)
  */
 private $email;

 /**
  * User constructor.
  * @param $username
  */
 public function __construct($username)
 {
  $this->username = $username;
 }

 /**
  * @return string
  */
 public function getUsername()
 {
  return $this->username;
 }

 /**
  * @param mixed $username
  */
 public function setUsername($username): void
 {
  $this->username = $username;
 }

 /**
  * @return string|null
  */
 public function getSalt()
 {
  return null;
 }

 /**
  * @return string|null
  */
 public function getPassword()
 {
  return $this->password;
 }

 /**
  * @param $password
  */
 public function setPassword($password)
 {
  $this->password = $password;
 }
 /**
  * @return mixed
  */
 public function getEmail()
 {
  return $this->email;
 }

 /**
  * @param mixed $email
  */
 public function setEmail($email): void
 {
  $this->email = $email;
 }

 /**
  * @return array|string[]
  */
 public function getRoles()
 {
  return array('ROLE_USER');
 }

 public function eraseCredentials()
 {
 }

}
