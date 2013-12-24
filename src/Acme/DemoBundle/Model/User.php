<?php

namespace Acme\DemoBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class User
{
    public $id;

    public $name;

    public $email;

    /**
     * @var int
     */
    public $age;
}
