<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ConvertShapefile extends Command
{
    protected $signature = 'convert:shapefile {input} {output}';
    protected $description = 'Convert Shapefile to GeoJSON';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $input = $this->argument('input');
        $output = $this->argument('output');

        $env_path = env('OGRPath');
        $command = $env_path." -f GeoJSON '$output' '$input' -t_srs 'EPSG:4326' "; //  -s_srs 'EPSG:32750' -t_srs 'EPSG:4326' ";

        exec($command, $output, $result);

        if ($result == 0) {
            $this->info('Conversion successful!');
        } else {
            $this->error('Conversion failed!');
        }
    }
}