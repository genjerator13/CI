<?php

namespace Numa\CIAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * User
 */
class User implements UserInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $email;

    /**
     * @var \DateTime
     */
    private $registration_date;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var integer
     */
    private $contract_id;

    /**
     * @var string
     */
    private $FirstName;

    /**
     * @var string
     */
    private $LastName;

    /**
     * @var \DateTime
     */
    private $date_created;

    /**
     * @var \DateTime
     */
    private $date_updated;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */

   

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Importfeed = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set username
     *
     * @param string $username
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
    public function getRoles()
    {
        return array('ROLE_ADMIN');
    }
 
    public function getSalt()
    {
        return null;
    }
 
    public function eraseCredentials()
    {
 
    }
    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
//        global $kernel;
//        if ('AppCache' == get_class($kernel)) {
//            $kernel = $kernel->getKernel();
//        }
//
//        $factory = $kernel->getContainer()->get('security.encoder_factory');
//        $encoder = $factory->getEncoder($this);
//        $encodedPassword = $encoder->encodePassword($password, $this->getSalt());
//        //$user->setPassword($encodedPassword);
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
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
     * Set registration_date
     *
     * @param \DateTime $registrationDate
     * @return User
     */
    public function setRegistrationDate($registrationDate)
    {
        $this->registration_date = $registrationDate;

        return $this;
    }

    /**
     * Get registration_date
     *
     * @return \DateTime 
     */
    public function getRegistrationDate()
    {
        return $this->registration_date;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return User
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set contract_id
     *
     * @param integer $contractId
     * @return User
     */
    public function setContractId($contractId)
    {
        $this->contract_id = $contractId;

        return $this;
    }

    /**
     * Get contract_id
     *
     * @return integer 
     */
    public function getContractId()
    {
        return $this->contract_id;
    }

    /**
     * Set FirstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->FirstName = $firstName;

        return $this;
    }

    /**
     * Get FirstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->FirstName;
    }

    /**
     * Set LastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->LastName = $lastName;

        return $this;
    }

    /**
     * Get LastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->LastName;
    }

    /**
     * Set date_created
     *
     * @param \DateTime $dateCreated
     * @return User
     */
    public function setDateCreated($dateCreated)
    {
        $this->date_created = $dateCreated;

        return $this;
    }

    /**
     * Get date_created
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * Set date_updated
     *
     * @param \DateTime $dateUpdated
     * @return User
     */
    public function setDateUpdated($dateUpdated)
    {
        $this->date_updated = $dateUpdated;

        return $this;
    }

    /**
     * Get date_updated
     *
     * @return \DateTime 
     */
    public function getDateUpdated()
    {
        return $this->date_updated;
    }

   
    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue() {
            $this->date_created = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue() {
        $this->date_updated = new \DateTime();
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $container;


    /**
     * Add container
     *
     * @param \Numa\CIAdminBundle\Entity\Container $container
     * @return User
     */
    public function addContainer(\Numa\CIAdminBundle\Entity\Container $container)
    {
        $this->container[] = $container;

        return $this;
    }

    /**
     * Remove container
     *
     * @param \Numa\CIAdminBundle\Entity\Container $container
     */
    public function removeContainer(\Numa\CIAdminBundle\Entity\Container $container)
    {
        $this->container->removeElement($container);
    }

    /**
     * Get container
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContainer()
    {
        return $this->container;
    }
    
            /**
     * Get User
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function __toString()
    {
        return $this->getUsername();
    }

 
    public function equals(User $user)
    {
        return $user->getUsername() == $this->getUsername();
    }  
    /**
     * @var string
     */
    private $user_group;


    /**
     * Set user_group
     *
     * @param string $userGroup
     * @return User
     */
    public function setUserGroup($userGroup)
    {
        $this->user_group = $userGroup;

        return $this;
    }

    /**
     * Get user_group
     *
     * @return string 
     */
    public function getUserGroup()
    {
        return $this->user_group;
    }
}
