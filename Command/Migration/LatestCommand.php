<?php

namespace SP\DBALBundle\Command\Migration;

use SP\DBALBundle\Command\DBALCommandTrait;

class LatestCommand extends \Doctrine\DBAL\Migrations\Tools\Console\Command\LatestCommand {
    protected $isMigrationCommand = true;
    use DBALCommandTrait;
}
