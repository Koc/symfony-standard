<?php

namespace Acme\DemoBundle\Command;

use Acme\DemoBundle\Model\User;
use Acme\DemoBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Form\FormView;

class TestFormCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('acme:test-form');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $user = new User();
        $user->age = 12;

        $form = $this->getContainer()->get('form.factory')->create(new UserType(), $user);

        $data = array(
            'email' => 'test@mail.com'
        );
        $form->submit($data);

        // got an exception here when using Symfony 2.4
    }
}
