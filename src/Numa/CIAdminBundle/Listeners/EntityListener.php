<?php

namespace Numa\CIAdminBundle\Listeners;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Numa\CIAdminBundle\Entity\User;
use \Numa\CIAdminBundle\Entity\Container as container;

class EntityListener {

    protected $container;

    public function __construct($container = null) {
        $this->container = $container;
    }

    public function prePersist(LifecycleEventArgs $args) {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();

        // perhaps you only want to act on some "Product" entity
        if ($entity instanceof container) {
            $user = $this->container->get('security.context')->getToken()->getUser();
            $entity->setUser($user);
            //trim spaces
            $name = $entity->getName();
            $name = str_replace(" ", "", $name);
            $entity->setName($name);
        } elseif ($entity instanceof User) {
            $factory = $this->container->get('security.encoder_factory');
            $encoder = $factory->getEncoder($entity);
            $encodedPassword = $encoder->encodePassword($entity->getPassword(), $entity->getSalt());
            $entity->setPassword($encodedPassword);
        }
    }

    public function preUpdate(LifecycleEventArgs $args) {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();
        if ($entity instanceof container) {
            //trim spaces
            $name = $entity->getName();
            $name = str_replace(" ", "", $name);
            $entity->setName($name);
        } else if ($entity instanceof User) {
            $factory = $this->container->get('security.encoder_factory');
            $encoder = $factory->getEncoder($entity);

            $encodedPassword = $encoder->encodePassword($entity->getPassword(), $entity->getSalt());
            $entity->setPassword($encodedPassword);
        }
    }

}
