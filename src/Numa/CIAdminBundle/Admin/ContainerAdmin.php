<?php

namespace Numa\CIAdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Form\FormMapper;

class ContainerAdmin extends Admin {

    // setup the default sort column and order
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'name'
    );

    protected function configureRoutes(RouteCollection $collection) {
        $collection->add('listin');
    }

    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('name')
                ->add('containerType')
                ->add('colorType')
                ->add('inoutxxx', 'choice', array('choices' => array("In" => "In", "Out" => "Out"), 'label' => 'In out'))
                ->add('hauling', 'String', array('label' => 'Transport'))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('name')
                ->add('date_created', 'doctrine_orm_date_range');
        ;
    }

    protected function configureListFields(ListMapper $listMapper) {
        $this->setTemplate('list', 'SonataAdminBundle:CRUD:container_list.html.twig');
        $listMapper
                ->addIdentifier('name')
                ->addIdentifier('containerType')
                ->addIdentifier('colorType')
                ->addIdentifier('inoutxxx', 'String', array('label' => 'In Out'))
                ->addIdentifier('hauling', 'String', array('label' => 'Transport'))
                ->addIdentifier('user')
                ->addIdentifier('date_created')

        ;
    }

    public function createQuery($context = 'listin') {


        $query = parent::createQuery($context);
        if ($this->getRequest()->get('_sonata_name') == 'admin_numa_ciadmin_container_listin') {
            $query->andWhere(
                    $query->expr()->eq($query->getRootAlias() . '.inoutxxx', ':my_param')
            );

            $query->setParameter('my_param', 'in');
        }
        return $query;
    }

}
