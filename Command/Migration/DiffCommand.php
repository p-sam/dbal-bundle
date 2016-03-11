<?php

namespace SP\DBALBundle\Command\Migration;

use SP\DBALBundle\Command\DBALCommandTrait;

class DiffCommand extends \Doctrine\DBAL\Migrations\Tools\Console\Command\DiffCommand {
    protected $isMigrationCommand = true;
    use DBALCommandTrait;
}
