<?php

namespace SP\DBALBundle\Command\Migration;

use SP\DBALBundle\Command\DBALCommandTrait;

class VersionCommand extends \Doctrine\DBAL\Migrations\Tools\Console\Command\VersionCommand {
    protected $isMigrationCommand = true;
    use DBALCommandTrait;
}
