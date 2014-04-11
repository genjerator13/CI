<?php

namespace Numa\CIAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Container
 */
class Container {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $container_type_id;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $date_created;

    /**
     * @var \DateTime
     */
    private $date_updated;

    /**
     * @var \Numa\CIAdminBundle\Entity\ContainerType
     */
    private $containerType;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Container
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set container_type_id
     *
     * @param integer $containerTypeId
     * @return Container
     */
    public function setContainerTypeId($containerTypeId) {
        $this->container_type_id = $containerTypeId;

        return $this;
    }

    /**
     * Get container_type_id
     *
     * @return integer 
     */
    public function getContainerTypeId() {
        return $this->container_type_id;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Container
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set date_created
     *
     * @param \DateTime $dateCreated
     * @return Container
     */
    public function setDateCreated($dateCreated) {
        $this->date_created = $dateCreated;

        return $this;
    }

    /**
     * Get date_created
     *
     * @return \DateTime 
     */
    public function getDateCreated() {
        return $this->date_created;
    }

    /**
     * Set date_updated
     *
     * @param \DateTime $dateUpdated
     * @return Container
     */
    public function setDateUpdated($dateUpdated) {
        $this->date_updated = $dateUpdated;

        return $this;
    }

    /**
     * Get date_updated
     *
     * @return \DateTime 
     */
    public function getDateUpdated() {
        return $this->date_updated;
    }

    /**
     * Set containerType
     *
     * @param \Numa\CIAdminBundle\Entity\ContainerType $containerType
     * @return Container
     */
    public function setContainerType(\Numa\CIAdminBundle\Entity\ContainerType $containerType = null) {
        $this->containerType = $containerType;

        return $this;
    }

    /**
     * Get containerType
     *
     * @return \Numa\CIAdminBundle\Entity\ContainerType 
     */
    public function getContainerType() {
        return $this->containerType;
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

    public function __toString() {
        return $this->name;
    }

    /**
     * @var integer
     */
    private $user_id;

    /**
     * @var \Numa\CIAdminBundle\Entity\User
     */
    private $user;


    /**
     * Set user_id
     *
     * @param integer $userId
     * @return Container
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get user_id
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set user
     *
     * @param \Numa\CIAdminBundle\Entity\User $user
     * @return Container
     */
    public function setUser(\Numa\CIAdminBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Numa\CIAdminBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * @var string
     */
    private $hauling;

    /**
     * @var string
     */
    private $inout;


    /**
     * Set hauling
     *
     * @param string $hauling
     * @return Container
     */
    public function setHauling($hauling)
    {
        $this->hauling = $hauling;

        return $this;
    }

    /**
     * Get hauling
     *
     * @return string 
     */
    public function getHauling()
    {
        return $this->hauling;
    }

    /**
     * Set inout
     *
     * @param string $inout
     * @return Container
     */
    public function setInout($inout)
    {
        $this->inout = $inout;

        return $this;
    }

    /**
     * Get inout
     *
     * @return string 
     */
    public function getInout()
    {
        return $this->inout;
    }
    /**
     * @var string
     */
    private $inoutxxx;


    /**
     * Set inoutxxx
     *
     * @param string $inoutxxx
     * @return Container
     */
    public function setInoutxxx($inoutxxx)
    {
        $this->inoutxxx = $inoutxxx;

        return $this;
    }

    /**
     * Get inoutxxx
     *
     * @return string 
     */
    public function getInoutxxx()
    {
        return $this->inoutxxx;
    }
}
