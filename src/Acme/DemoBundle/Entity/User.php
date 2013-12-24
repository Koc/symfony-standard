<?php

namespace Acme\DemoBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class User
{
    public $id;

    public $name;

    public $email;

    // dummy field used for autosuggest. This field should be highlighted if friends count less than 3
    public $friendEmail;

    /**
     * @Assert\Count(min="3", minMessage="You should select at least 3 friends.")
     *
     * @var array
     */
    public $friends = array();
}
