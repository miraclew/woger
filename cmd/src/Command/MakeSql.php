<?php
/**
 * Created by PhpStorm.
 * User: bob
 * Date: 12/2/14
 * Time: 5:21 PM
 */

namespace Woger\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeSql extends Command {
    protected function configure()
    {
        $this
            ->setName('make:sql')
            ->setDescription('Make a new sql file')
            ->setDefinition(array(
                new InputArgument('name', InputArgument::REQUIRED, 'Sql file name'),
            ));
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        $resourcePath = ESB_PATH . '/module/vidaXL/resource';

        $fileName = $resourcePath . '/' . $name . '_' . time() . '.sql';
        file_put_contents($fileName, '');

        $output->writeln(sprintf('Sql file created: %s', $fileName));
    }
} 