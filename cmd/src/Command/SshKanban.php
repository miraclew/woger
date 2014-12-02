<?php
/**
 * Created by PhpStorm.
 * User: bob
 * Date: 12/2/14
 * Time: 5:50 PM
 */

namespace Woger\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

class SshKanban extends Command {
    protected function configure()
    {
        $this->setName('ssh:kanban')
            ->setDescription('SSH to kanban server');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $cmd = "ssh -i /home/bob/keys/AMItemplateserver.pem ubuntu@54.179.160.196";
        exec($cmd);
        $process = new Process($cmd);
        $process->start();
    }


} 