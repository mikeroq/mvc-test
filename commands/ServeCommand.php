<?php

use Illuminate\Console\Command;
use Illuminate\Support\Env;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Process\PhpExecutableFinder;
use Symfony\Component\Process\Process;

class ServeCommand extends Command
{
    protected $name = 'serve';
    protected $description = 'Start the built in PHP web server and run the app';
    protected int $portOffset = 0;

    public function handle()
    {
        chdir('./public');
        $this->line("<info>Starting PHP development server:</info> http://{$this->host()}:{$this->port()}");

        $process = $this->startProcess();

        while ($process->isRunning()) {
            usleep(500 * 1000);
        }

        return $process->getExitCode();
    }

    protected function startProcess(): Process
    {
        $process = new Process($this->serverCommand(), null);
        $process->start(function ($type, $buffer) {
            $this->output->write($buffer);
        });

        return $process;
    }

    protected function serverCommand(): array
    {
        return [
            (new PhpExecutableFinder())->find(),
            '-S',
            $this->host().':'.$this->port(),
        ];
    }

    protected function host()
    {
        [$host, ] = $this->getHostAndPort();

        return $host;
    }

    protected function port()
    {
        $port = $this->input->getOption('port');

        if (is_null($port)) {
            [, $port] = $this->getHostAndPort();
        }

        $port = $port ?: 8000;

        return $port + $this->portOffset;
    }

    protected function getHostAndPort()
    {
        $hostParts = explode(':', $this->input->getOption('host'));

        return [
            $hostParts[0],
            $hostParts[1] ?? null,
        ];
    }

    protected function canTryAnotherPort(): bool
    {
        return is_null($this->input->getOption('port')) &&
            ($this->input->getOption('tries') > $this->portOffset);
    }

    protected function getOptions(): array
    {
        return [
            ['host', null, InputOption::VALUE_OPTIONAL, 'The host address to serve the application on', '127.0.0.1'],
            ['port', null, InputOption::VALUE_OPTIONAL, 'The port to serve the application on', Env::get('SERVER_PORT')],
            ['tries', null, InputOption::VALUE_OPTIONAL, 'The max number of ports to attempt to serve from', 10]
        ];
    }

}