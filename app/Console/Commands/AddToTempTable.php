<?php

namespace App\Console\Commands;

set_time_limit(0);

use Illuminate\Console\Command;
use App\Models\Temptable;

class AddToTempTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'addToTempTable:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add rows to temp table for download datas';

    private $type = [
        0 => 'funds',
        1 => 'inventory',
        2 => 'cases',
        3 => 'pages'
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dir = public_path(config('app.download_dir'));

        $this->scan($dir, 0);

        return 0;
    }

    private function scan($dir, $type, $path = [])
    {
        $rows = scandir($dir);
        if (count($rows)) {
            foreach ($rows as $row) {
                if (!in_array($row, ['.', '..'])) {
                    $load = new Temptable();
                    switch ($type) {
                        case 1: {
                            $load->fund = $path[0];
                            $load->inventory = $row;
                            $path[1] = $row;
                            break;
                        }
                        case 2: {
                            $load->fund = $path[0];
                            $load->inventory = $path[1];
                            $load->case = $row;
                            $path[2] = $row;
                            break;
                        }
                        case 3: {
                            $load->fund = $path[0];
                            $load->inventory = $path[1];
                            $load->case = $path[2];
                            $load->page = $row;
                            $path[3] = $row;
                            break;
                        }
                        default: {
                            $load->fund = $row;
                            $path[0] = $row;
                        }
                    }
                    $load->save();
                    if (is_dir($dir . '/' . $row)) {
                        $path[] = $row;
                        $this->scan($dir . '/' . $row, $type + 1, $path );
                    }
                }
            }
        }

        return ;
    }
}
