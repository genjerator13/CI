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
                ->add('name', 'text', array('label' => 'Unit #'))
                ->add('containerType')
                ->add('colorType')
                ->add('inoutxxx', 'choice', array('choices' => array("In" => "In", "Out" => "Out"), 'label' => 'In out'))
                ->add('hauling', 'text', array('label' => 'Transport','required'=>false))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('name', 'doctrine_orm_string', array('label' => 'Unit #'))
                ->add('date_created', 'doctrine_orm_date_range');
        ;
    }

    protected function configureListFields(ListMapper $listMapper) {
        $this->setMaxPerPage(10000000);
        $this->setTemplate('list', 'SonataAdminBundle:CRUD:container_list.html.twig');
        $listMapper
                ->addIdentifier('name', 'string', array('label' => 'Unit #'))
                ->addIdentifier('containerType')
                ->addIdentifier('colorType')
                ->addIdentifier('inoutxxx', 'string', array('label' => 'In Out'))
                ->addIdentifier('hauling', 'string', array('label' => 'Transport'))
                ->addIdentifier('user')
                ->addIdentifier('date_created')

        ;
    }

    public function createQuery($context = 'listin') {

        
        $subquery = $this->getConfigurationPool()->getContainer()->get('doctrine')->getEntityManager()->createQueryBuilder()
         ->select('c.name')
         ->from('Numa\CIAdminBundle\Entity\Container', 'c')                 
                 ->where('c.inoutxxx like \'in\'')
         ->getDql();
        //$subquery

        $query = parent::createQuery($context);

        if ($this->getRequest()->get('_sonata_name') == 'admin_numa_ciadmin_container_listin') {
            $query->andWhere(
                    $query->expr()->eq($query->getRootAlias() . '.inoutxxx', ':my_param1')
            );
            $query->andWhere($query->expr()->In($query->getRootAlias().'.name  ', $subquery));
            $query->andWhere($query->getRootAlias() . '.inoutxxx not like \'out\'');
            $query->setParameter('my_param1', 'in');
            
        }               
        
        
        return $query;
    }
    
    public function getPerPageOptions() {
        //$array = parent::getPerPageOptions();
        $array = array('25','50','All');
        
        return $array;
    }
    
    public function getFilterParameters() {
        $filter = $this->getRequest()->get('filter');
        $perpage = $filter['_per_page'];

        $this->setMaxPerPage($perpage);
        if ($perpage == 'All') {
            
            $this->setMaxPerPage(10000000);
        }
        return parent::getFilterParameters();
    }

}
