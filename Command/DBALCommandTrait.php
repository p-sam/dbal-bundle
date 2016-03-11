<?php

namespace SP\DBALBundle\Command;

use Doctrine\DBAL\Migrations\Configuration\Configuration;
use Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


trait DBALCommandTrait {

    protected $connection;
    protected $migrationConfiguration;

    protected function configure()     {
        parent::configure();
        $this->setName('db:'.$this->getName());
        $def = $this->getDefinition();
        $opts = $def->getOptions();
        foreach(["configuration",'db-configuration'] as $opt) {
            if (isset($opts[$opt])) {
                unset($opts[$opt]);
            }
        }
        $def->setOptions($opts);
        $this->addOption('connection','c',InputOption::VALUE_REQUIRED,'The configured connection to use.',null);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $isMigration = property_exists($this, "isMigrationCommand") && $this->{'isMigrationCommand'};
        if ($isMigration) {
            $output->writeln('<info>DBAL Migration ' . \Doctrine\DBAL\Migrations\MigrationsVersion::VERSION() . '</info>');
        }

        $output->writeln('<info>DBAL v' . \Doctrine\DBAL\Version::VERSION . '</info>');
        $output->writeln('<info>-------</info>');
        $service = $this->getApplication()->getKernel()->getContainer()->get('db');

        $conn_name = $input->getOption('connection');

        $conn = $service->connect($conn_name);

        $helperSet = $this->getHelperSet();
        $helperSet->set( new ConnectionHelper( $conn ), 'db' );

        if($isMigration) {
            $migrationConfiguration = new Configuration($conn);
            $config = $service->getMigrationConfiguration($conn_name);

            $migrationConfiguration->setName($conn_name);
            $migrationConfiguration->setMigrationsDirectory($config['directory']);
            $migrationConfiguration->setMigrationsNamespace($config['namespace']);
            $migrationConfiguration->setMigrationsTableName($config['table']);

            $this->migrationConfiguration = $migrationConfiguration;
            $this->connection = $conn;
        }

        parent::execute($input,$output);
    }

    private function getConnection(InputInterface $input = null){
        if ($this->connection) {
            return $this->connection;
        }

        throw new \InvalidArgumentException('No such connection');
    }

    protected function getMigrationConfiguration(InputInterface $input, OutputInterface $output)
    {

        return $this->migrationConfiguration;
    }
}