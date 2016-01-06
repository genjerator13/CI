<?php

namespace Numa\CIAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ColorType
 */
class ColorType
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $container;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->container = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return ColorType
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add container
     *
     * @param \Numa\CIAdminBundle\Entity\Container $container
     * @return ColorType
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
    
    public function __toString() {
        return $this->getName()."";;
    }
}
