<?php
namespace Woger\Command;


use Faker\Factory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Fake extends Command {
    protected function configure()
    {
        $this
            ->setName('fake')
            ->setDescription('Fake a name')
            ->setDefinition(array(
            ));
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $faker = Factory::create('zh_CN');
        $output->writeln($faker->name);
        $output->writeln($faker->address);
        $output->writeln($faker->paragraph);
    }
} 