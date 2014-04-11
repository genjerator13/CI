<?php
namespace Numa\CIAdminBundle\Command;
 
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Numa\CIAdminBundle\Entity\User;
 
class UserCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        //php app/console numa:DOA:users admin admin
        $this
            ->setName('numa:users')
            ->setDescription('Add DOA user')
            ->addArgument('username', InputArgument::REQUIRED, 'The username')
            ->addArgument('password', InputArgument::REQUIRED, 'The password')
        ;
    }
 
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $username = $input->getArgument('username');
        $password = $input->getArgument('password');
 
        $em = $this->getContainer()->get('doctrine')->getManager();
 
        $user = new User();
        $user->setUsername($username);
        // encode the password
        $factory = $this->getContainer()->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);
        $encodedPassword = $encoder->encodePassword($password);
        $output->writeln(sprintf($encodedPassword));
        $user->setPassword($encodedPassword);
        $em->persist($user);
        $em->flush();
 
        $output->writeln(sprintf('Added %s user with password %s', $username, $password));
    }
}
