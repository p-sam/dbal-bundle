<?php

namespace SP\DBALBundle\Command\Migration;

use SP\DBALBundle\Command\DBALCommandTrait;

class MigrateCommand extends \Doctrine\DBAL\Migrations\Tools\Console\Command\MigrateCommand {
    protected $isMigrationCommand = true;
    use DBALCommandTrait;
}
