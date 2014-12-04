<?php
/**
 * Created by PhpStorm.
 * User: bob
 * Date: 12/3/14
 * Time: 10:53 AM
 */

namespace Woger\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

class RsyncCronData extends Command {
    protected function configure()
    {
        $this->setName('rsync:crondata')
            ->setDescription('rsync cron_data folder from kanban');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $cmd = "rsync -avr -e 'ssh -i /home/bob/keys/AMItemplateserver.pem' ubuntu@kanban.esb:/var/www/data/log/cron_data/ /var/www/data/log/cron_data";
        $process = new Process($cmd);
        $process->run(function($type, $buffer) use($output) {
            if (Process::ERR === $type) {
                $output->writeln("<error>$buffer</error>");
            } else {
                $output->writeln("<info>$buffer</info>");
            }
        });

        $output->writeln('<comment>Done!</comment>');
    }
} 