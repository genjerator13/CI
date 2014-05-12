<?php

namespace Numa\CIAdminBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;

class ContainerAdminController extends Controller {

    public function listinAction() {
        if (false === $this->admin->isGranted('LIST')) {
            throw new AccessDeniedException();
        }

        $datagrid = $this->admin->getDatagrid();
        $formView = $datagrid->getForm()->createView();

        // set the theme for the current Admin Form
        $this->get('twig')->getExtension('form')->renderer->setTheme($formView, $this->admin->getFilterTheme());
        //\Doctrine\Common\Util\Debug::dump($datagrid->buildPager());
        return $this->render($this->admin->getTemplate('list'), array(
                    'action' => 'listin',
                    'form' => $formView,
                    'pagerurl' => 'listin',
                    'datagrid' => $datagrid,
                    'csrf_token' => $this->getCsrfToken('sonata.batch'),
        ));
    }

}
