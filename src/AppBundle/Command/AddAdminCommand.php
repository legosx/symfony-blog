<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Input\InputArgument;

class AddAdminCommand extends AddUserCommand
{
    public $role = 'ROLE_ADMIN';

    protected function configure()
    {
        $this
            ->setName('app:add-admin')
            ->setDescription('Add a new admin')
            ->addArgument('email', InputArgument::OPTIONAL, 'The username of the new admin')
            ->addArgument('password', InputArgument::OPTIONAL, 'The plain password of the new admin');
    }
}
