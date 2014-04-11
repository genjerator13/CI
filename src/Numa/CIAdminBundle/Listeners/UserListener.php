<?php
namespace Numa\CIAdminBundle\Listeners;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Numa\CIAdminBundle\Entity\User;

class UserListener
{
    public function prePersists(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();

        // perhaps you only want to act on some "Product" entity
        if ($entity instanceof User) {
           die("sssss");
        }
    }
}