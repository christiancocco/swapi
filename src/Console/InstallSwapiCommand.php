<?php

namespace ChristianCocco\Swapi\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallSwapiCommand extends Command
{
    protected $signature = 'swapi:install';

    protected $description = 'Install the SwapiPackage';

    public function handle()
    {
        $this->info('Installing SwapiPackage...');

        //Publishing Configuration
        $this->info('Publishing configuration...');

        if (! $this->configExists('swapipackage.php')) {
            $this->publishConfiguration();
            $this->info('Published configuration');
        } else {
            if ($this->shouldOverwriteConfig()) {
                $this->info('Overwriting configuration file...');
                $this->publishConfiguration($force = true);
            } else {
                $this->info('Existing configuration was not overwritten');
            }
        }

        $this->comment('Creating DB structure...');
        $this->call('migrate');
        $this->comment('Default DB initialized!');
        $this->info('Installed SwapiPackage');
    }

    private function configExists($fileName)
    {
        $this->info(File::exists(config_path($fileName)));
        return File::exists(config_path($fileName));
    }

    private function shouldOverwriteConfig()
    {
        return $this->confirm(
            'Config file already exists. Do you want to overwrite it?',
            false
        );
    }

    private function publishConfiguration($forcePublish = false)
    {
        $params = [
            '--provider' => "ChristianCocco\Swapi\SwapiServiceProvider",
            '--tag' => "swapi-config"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

       $this->call('vendor:publish', $params);
    }
}
