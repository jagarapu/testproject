<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * User
 * 
 * @ORM\Table(name="user")
 * @UniqueEntity(fields="username",message="Username already exists in database",groups={"registration"})
 * @UniqueEntity(fields="email",message = "Email already exists in database",groups={"registration"})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User {
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var string
     * @Assert\NotBlank(message="Firstname cannot be blank", groups={"registration"})
     * @Assert\Length(min=4,max=100,minMessage="Firstname should be minimum {{ limit }} characters", maxMessage="Your Firstname cannot be longer than {{ limit }} characters",groups={"registration"}
     * )
     * @Assert\Regex(
     *      pattern="/[^A-Za-zà-ÿÀ-Ÿ .\']/i",
     *      match=false,
     *      message="Firstname allows only a-z,A-Z and few special characters (. ')",groups={"registration"})
     * @ORM\Column(name="firstname", type="string", length=100, nullable=false)
     */
    protected $firstname;

    /**
     * @var string
     * @Assert\NotBlank(message="Lastname cannot be blank", groups={"registration"})
     * @Assert\Length(min=4,max=100,minMessage="Lastname should be minimum {{ limit }} characters", maxMessage="Your Lastname cannot be longer than {{ limit }} characters",groups={"registration"}
     * )
     * @Assert\Regex(
     *      pattern="/[^A-Za-zà-ÿÀ-Ÿ .\']/i",
     *      match=false,
     *      message="Lastname allows only a-z,A-Z and few special characters (. ')",groups={"registration"})
     * @ORM\Column(name="lastname", type="string", length=100, nullable=false)
     */
    protected $lastname;
    
    /**
     * 
     * @Assert\NotBlank( message = "Username cannot be blank", groups={"registration"})
     * @Assert\Regex(
     *      pattern="/[^a-zA-Z0-9-_]/", 
     *      match = false,
     *      message = "Username allows only a-z,A-Z,0-9,_", groups={"registration"})
     * @Assert\Length(min=4,max=30,minMessage="Username should be minimum {{ limit }} characters",maxMessage="Username cannot exceeds {{ limit }} characters",groups={"registration"})
     * @ORM\Column(name="username", type="string", length=100, nullable=false)
     */
    protected $username;
    
    /**
     * @Assert\Email(message = "Email not valid", groups={"registration"})
     * @Assert\NotBlank(message = "Email cannot be blank", groups={"registration"})
     * @Assert\Length(max=255,maxMessage="Email cannot exceeds 255 characters")
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    protected $email;
    
    /**
     * @Assert\NotBlank( message = "Password cannot be blank", groups={"registration"})
     * @Assert\Length(min=4,max=30,minMessage="Password should be minimum {{ limit }} characters",maxMessage="Password cannot exceeds {{ limit }} characters",groups={"registration"})
     * @ORM\Column(name="plainPassword", type="string", length=100, nullable=false)
     */
    protected $plainPassword;
    
    /**
     * @var string
     *
     * @ORM\Column(name="salutation", type="string", nullable=true)
     */
    protected $salutation;
    
    /**
     * @var string
     * @Assert\NotBlank(message="Mobile number cannot be blank",groups={"registration"})
     * @Assert\Length(min=4,max=18,minMessage="Mobile number should be minimum {{ limit }} characters", maxMessage="Your Mobile cannot be longer than {{ limit }} characters",groups={"registration"}
     * )
     * @Assert\Regex(
     *      pattern="/[^0-9 +\-]/",
     *      match = false,
     *      message = "Mobile number allows only (0-9,+,-)", groups={"registration"})
     * @ORM\Column(name="mobile", type="string", length=18, nullable=false)
     */
    protected $mobile;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateofbirth", type="date", nullable=true)
     */
    protected $dateofbirth;
    

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set salutation
     *
     * @param string $salutation
     *
     * @return User
     */
    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;

        return $this;
    }

    /**
     * Get salutation
     *
     * @return string
     */
    public function getSalutation()
    {
        return $this->salutation;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     *
     * @return User
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set dateofbirth
     *
     * @param \DateTime $dateofbirth
     *
     * @return User
     */
    public function setDateofbirth($dateofbirth)
    {
        $this->dateofbirth = $dateofbirth;

        return $this;
    }

    /**
     * Get dateofbirth
     *
     * @return \DateTime
     */
    public function getDateofbirth()
    {
        return $this->dateofbirth;
    }


    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set plainPassword
     *
     * @param string $plainPassword
     *
     * @return User
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * Get plainPassword
     *
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }
}
