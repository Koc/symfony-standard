<?php

namespace Acme\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text');
        $builder->add('email', 'email');
        // dummy field used for autosuggest. This field should be highlighted if friends count less than 3
        $builder->add('friendEmail', 'email');
        $builder->add('friends', 'collection', array(
                'allow_add' => true,
                'type' => new FriendType(),
            ));
    }

    public function getName()
    {
        return 'userform';
    }
}
