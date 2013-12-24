<?php

namespace Acme\DemoBundle\Model;

class UserQuery
{
    public function getTableMap()
    {
        return \Propel::getDatabaseMap('user')->getTableByPhpName('Acme\\DemoBundle\\Model\\User');
    }
}
