<?php

namespace Numa\CIAdminBundle\Admin;
 
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
 
class UserAdmin extends Admin
{
    // setup the default sort column and order
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'username'
    );
 
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('username')
            ->add('FirstName')
            ->add('LastName')
            ->add('email')
            ->add('user_group', 'choice', array('choices' => array("Admin"=>"Admin","User"=>"Regular user")))
            ->add('password', 'repeated', array(
                'type' => 'password',
                'first_options' => array('label' => 'password'),
                'second_options' => array('label' => 'password confirmation'),
                'invalid_message' => 'Password missmatch',

               // 'attr'=>array('class'=>'sonata-ba-field-container')
            ))

        ;
    }
 
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('username')
        ;
    }
 
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('username')
            ->addIdentifier('FirstName')
            ->addIdentifier('LastName')
            ->addIdentifier('user_group')

        ;
    }
}
