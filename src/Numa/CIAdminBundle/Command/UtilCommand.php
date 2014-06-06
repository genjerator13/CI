<?php
namespace Numa\CIAdminBundle\Command;
 
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Numa\CIAdminBundle\Entity\Container;
 
class UtilCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        //php app/console numa:DOA:users admin admin
        $this
            ->setName('numa:util')
            ->setDescription('Remove spaces from unit#')
        ;
    }
 
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
        $containerRepo = $em->getRepository("NumaCIAdminBundle:Container");
        $conts = $containerRepo->findAll();
        foreach($conts as $c){
            //trim spaces
            $name = $c->getName();
            $name = str_replace(" ", "", $name);
            $c->setName($name);
            $em->persist($c);

        }
        $em->flush();
        $output->writeln(sprintf('Removed white space from all unit#'));
    }
}
