<?php

namespace Numa\CIAdminBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;

class ContainerAdminController extends Controller {

    public function listinAction() {
        
        return $this->listAction('aaa');
    }



}
