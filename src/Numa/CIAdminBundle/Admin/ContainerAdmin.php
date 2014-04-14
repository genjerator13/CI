<?php

namespace Numa\CIAdminBundle\Admin;
 
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
 
class ContainerAdmin extends Admin
{
    // setup the default sort column and order
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'name'
    );
 
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('containerType')
            ->add('inoutxxx', 'choice', array('choices' => array("In"=>"In","Out"=>"Out"),'label'=>'In out'))
            ->add('hauling')
        ;
    }
 
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('date_created', 'doctrine_orm_date_range');
        ;
    }
 
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->addIdentifier('containerType')
            ->addIdentifier('inoutxxx')
            ->addIdentifier('hauling')
            ->addIdentifier('user')
            ->addIdentifier('date_created')

        ;
    }
}
