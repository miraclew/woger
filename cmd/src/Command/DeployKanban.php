<?php
/**
 * Created by PhpStorm.
 * User: bob
 * Date: 12/2/14
 * Time: 2:19 PM
 */

namespace Woger\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

class DeployKanban extends Command {

    protected function configure()
    {
        $this->setName('deploy:kanban')
            ->setDescription('Deploy code to kanban server');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $cmd = "ssh -i /home/bob/keys/AMItemplateserver.pem ubuntu@54.179.160.196 -t '
                cd /var/www && \
                svn up && \
                rm -rf /var/www/data/cache/*
            '
        ";
        $process = new Process($cmd);
        $process->run(function($type, $buffer) use($output) {
            if (Process::ERR === $type) {
                $output->writeln("<error>$buffer</error>");
            } else {
                $output->writeln("<info>$buffer</info>");
            }
        });

        $output->writeln('<comment>Please restart listeners and transformers if necessary!!!</comment>');
    }
} 