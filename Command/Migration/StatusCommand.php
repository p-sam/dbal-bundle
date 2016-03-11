<?php

namespace SP\DBALBundle\Command\Migration;

use SP\DBALBundle\Command\DBALCommandTrait;

class StatusCommand extends \Doctrine\DBAL\Migrations\Tools\Console\Command\StatusCommand {
    protected $isMigrationCommand = true;
    use DBALCommandTrait;
}
