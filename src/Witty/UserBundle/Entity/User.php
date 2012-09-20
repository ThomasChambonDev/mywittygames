<?php

namespace Witty\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Witty\UserBundle\Entity\User
 * @ORM\Entity(repositoryClass="Witty\UserBundle\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var \DateTime $createdAt
     */
    private $createdAt;

    /**
     * @var \DateTime $updatedAt
     */
    private $updatedAt;

    /**
     * @var string $login
     */
    private $login;

    /**
     * @var string $firstname
     */
    private $firstname;

    /**
     * @var string $lastname
     */
    private $lastname;

    /**
     * @var string $address
     */
    private $address;

    /**
     * @var string $address2
     */
    private $address2;

    /**
     * @var string $city
     */
    private $city;

    /**
     * @var string $postcode
     */
    private $postcode;

    /**
     * @var string $description
     */
    private $description;

    /**
     * @var float $balance
     */
    private $balance;

    /**
     * @var string $sex
     */
    private $sex;

    /**
     * @var string $avatar
     */
    private $avatar;

    /**
     * @var string $activationCode
     */
    private $activationCode;

    /**
     * @var \DateTime $birthdate
     */
    private $birthdate;

    /**
     * @var boolean $isEditor
     */
    private $isEditor;

    /**
     * @var boolean $isAuthor
     */
    private $isAuthor;

    /**
     * @var string $defaultLocale
     */
    private $defaultLocale;

    /**
     * @var string $country
     */
    private $country;

    /**
     * @var integer $fbId
     */
    private $fbId;

    /**
     * @var string $loginDp
     */
    private $loginDp;

    /**
     * @var string $passwordDp
     */
    private $passwordDp;

    /**
     * @var boolean $origine
     */
    private $origine;
	
    /**
     * @var boolean $newsletter
     */
    private $newsletter;
	
    /**
     * @var string $phone
     */
    private $phone;
	
    /**
     * @var sgtring $old_password
     */
    private $old_password;	
	
    /**
     * Cet attribut n'est pas mapp�
     */
    private $token;
	
    /**
     * Cet attribut n'est pas mapp�
     */
    private $token_mws;

	
	
	
	
    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return User
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;
    
        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
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
     * Set address
     *
     * @param string $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set address2
     *
     * @param string $address2
     * @return User
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
    
        return $this;
    }

    /**
     * Get address2
     *
     * @return string 
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     * @return User
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    
        return $this;
    }

    /**
     * Get postcode
     *
     * @return string 
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return User
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set balance
     *
     * @param float $balance
     * @return User
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    
        return $this;
    }

    /**
     * Get balance
     *
     * @return float 
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Set sex
     *
     * @param string $sex
     * @return User
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    
        return $this;
    }

    /**
     * Get sex
     *
     * @return string 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    
        return $this;
    }

    /**
     * Get avatar
     *
     * @return string 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set activationCode
     *
     * @param string $activationCode
     * @return User
     */
    public function setActivationCode($activationCode)
    {
        $this->activationCode = $activationCode;
    
        return $this;
    }

    /**
     * Get activationCode
     *
     * @return string 
     */
    public function getActivationCode()
    {
        return $this->activationCode;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return User
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    
        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set isEditor
     *
     * @param boolean $isEditor
     * @return User
     */
    public function setIsEditor($isEditor)
    {
        $this->isEditor = $isEditor;
    
        return $this;
    }

    /**
     * Get isEditor
     *
     * @return boolean 
     */
    public function getIsEditor()
    {
        return $this->isEditor;
    }

    /**
     * Set isAuthor
     *
     * @param boolean $isAuthor
     * @return User
     */
    public function setIsAuthor($isAuthor)
    {
        $this->isAuthor = $isAuthor;
    
        return $this;
    }

    /**
     * Get isAuthor
     *
     * @return boolean 
     */
    public function getIsAuthor()
    {
        return $this->isAuthor;
    }

    /**
     * Set defaultLocale
     *
     * @param string $defaultLocale
     * @return User
     */
    public function setDefaultLocale($defaultLocale)
    {
        $this->defaultLocale = $defaultLocale;
    
        return $this;
    }

    /**
     * Get defaultLocale
     *
     * @return string 
     */
    public function getDefaultLocale()
    {
        return $this->defaultLocale;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;
    
        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set fbId
     *
     * @param integer $fbId
     * @return User
     */
    public function setFbId($fbId)
    {
        $this->fbId = $fbId;
    
        return $this;
    }

    /**
     * Get fbId
     *
     * @return integer 
     */
    public function getFbId()
    {
        return $this->fbId;
    }

    /**
     * Set loginDp
     *
     * @param string $loginDp
     * @return User
     */
    public function setLoginDp($loginDp)
    {
        $this->loginDp = $loginDp;
    
        return $this;
    }

    /**
     * Get loginDp
     *
     * @return string 
     */
    public function getLoginDp()
    {
        return $this->loginDp;
    }

    /**
     * Set passwordDp
     *
     * @param string $passwordDp
     * @return User
     */
    public function setPasswordDp($passwordDp)
    {
        $this->passwordDp = $passwordDp;
    
        return $this;
    }

    /**
     * Get passwordDp
     *
     * @return string 
     */
    public function getPasswordDp()
    {
        return $this->passwordDp;
    }

    /**
     * Set origine
     *
     * @param boolean $origine
     * @return User
     */
    public function setOrigine($origine)
    {
        $this->origine = $origine;
    
        return $this;
    }

    /**
     * Get origine
     *
     * @return boolean 
     */
    public function getOrigine()
    {
        return $this->origine;
    }

    /**
     * Set level
     *
     * @param Witty\UserBundle\Entity\UserLevel $level
     * @return User
     */
    public function setLevel(\Witty\UserBundle\Entity\UserLevel $level = null)
    {
        $this->level = $level;
    
        return $this;
    }

    /**
     * Get level
     *
     * @return Witty\UserBundle\Entity\UserLevel 
     */
    public function getLevel()
    {
        return $this->level;
    }
	
    /**
     * Set newsletter
     *
     * @param boolean $newsletter
     * @return User
     */
    public function setNewsletter($newsletter = null)
    {
        $this->newsletter = $newsletter;
    
        return $this;
    }

    /**
     * Get newsletter
     *
     * @return boolean
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }
	
    /**
     * Set token
     *
     * @param Witty\UserBundle\Entity\UserLevel $level
     * @return User
     */
    public function setToken(\Witty\UserBundle\Entity\UserLevel $level = null)
    {
        $this->token = $this->password.$this->id;
    
        return $this;
    }

    /**
     * Get level
     *
     * @return Witty\UserBundle\Entity\UserLevel 
     */
    public function getToken()
    {
        return $this->password.'$'.$this->id;
    }	


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
     * Set old_password
     *
     * @param string $oldPassword
     * @return User
     */
    public function setOldPassword($oldPassword)
    {
        $this->old_password = $oldPassword;
    
        return $this;
    }

    /**
     * Get old_password
     *
     * @return string 
     */
    public function getOldPassword()
    {
        return $this->old_password;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }
}