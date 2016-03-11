<?php

namespace SP\DBALBundle\Command\Migration;

use SP\DBALBundle\Command\DBALCommandTrait;

class ExecuteCommand extends \Doctrine\DBAL\Migrations\Tools\Console\Command\ExecuteCommand {
    protected $isMigrationCommand = true;
    use DBALCommandTrait;
}
