<?php

namespace SP\DBALBundle\Command\Migration;

use SP\DBALBundle\Command\DBALCommandTrait;

class GenerateCommand extends \Doctrine\DBAL\Migrations\Tools\Console\Command\GenerateCommand {
    protected $isMigrationCommand = true;
    use DBALCommandTrait;
}
