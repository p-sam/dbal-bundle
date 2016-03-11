<?php

namespace SP\DBALBundle\Command;

class RunSqlCommand extends \Doctrine\DBAL\Tools\Console\Command\RunSqlCommand {
    use DBALCommandTrait;
}
