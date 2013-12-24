<?php

namespace Acme\DemoBundle\Command;

use Acme\DemoBundle\Entity\User;
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

        $form = $this->getContainer()->get('form.factory')->create(new UserType(), $user);

        $data = array(
            'email' => 'test@mail.com'
        );
        $form->submit($data);

        $formView = $form->createView();
        foreach ($formView as $item) { /* @var $item FormView */
            // expected "userform[friendEmail]", array of FormError
            var_dump($item->vars['full_name'], $item->vars['errors']);
        }

        var_dump($formView->vars['full_name'], $formView->vars['errors']);
    }
}
