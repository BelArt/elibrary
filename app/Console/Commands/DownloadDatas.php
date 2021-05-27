<?php

namespace App\Console\Commands;

set_time_limit(0);

use Illuminate\Console\Command;
use App\Models\{Funds, Inventory, Cases, Pages, Temptable};
use Illuminate\Validation\Rules\In;
use Image;
use File;
use Illuminate\Support\Facades\Storage;

class DownloadDatas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download-datas';

    private $load = null;

    private $fund = null;
    private $inventory = null;
    private $case = null;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download all rows from temp table per 10 rows';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->load = config('app.loaded_dir');
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $rows = Temptable::whereNull('loaded')->orderBy('id', 'asc')->take(10)->get();

        foreach ($rows as $row) {
            $this->download($row);
        }

        return ;
    }

    private function download($row)
    {
        $this->checkPath($row);

        if ($row->page) {
            $max = Pages::whereHas('case', function($q) {
                $q->where('id', $this->case->id);
            })->orderBy('page_number', 'desc')->first();

            $max = $max ? $max->page_number + 1 : 1;
            $p = new Pages();
            $p->fund()->associate($this->fund->id);
            $p->inventory()->associate($this->inventory->id);
            $p->case()->associate($this->case->id);
            $p->page_number = $max;
            $p->file = $row->page;
            $p->save();

            $this->loadImage($row, $p->id);

        } elseif ($row->case) {
            $this->case->fund()->associate($this->fund->id);
            $this->case->inventory()->associate($this->inventory->id);
            $this->case->number = $row->case;
            $this->case->name = '';
            $this->case->save();
            if (!File::exists(public_path($this->load . '/' . $this->fund->id . '/' . $this->inventory->id . '/' . $this->case->id))) {
                File::makedirectory(public_path($this->load . '/' . $this->fund->id . '/' . $this->inventory->id . '/' . $this->case->id));
                File::makedirectory(public_path($this->load . '/' . $this->fund->id . '/' . $this->inventory->id . '/' . $this->case->id . '/thumb'));
                File::makedirectory(public_path($this->load . '/' . $this->fund->id . '/' . $this->inventory->id . '/' . $this->case->id . '/medium'));
                File::makedirectory(public_path($this->load . '/' . $this->fund->id . '/' . $this->inventory->id . '/' . $this->case->id . '/max'));
            }

        } elseif ($row->inventory) {
            $this->inventory->fund()->associate($this->fund->id);
            $this->inventory->number = $row->inventory;
            $this->inventory->name = '';
            $this->inventory->save();
            if (!File::exists(public_path($this->load . '/' . $this->fund->id . '/' . $this->inventory->id)))
                File::makedirectory(public_path($this->load . '/' . $this->fund->id . '/' . $this->inventory->id));

        } else {
            $this->fund->number = $row->fund;
            $this->fund->name = '';
            $this->fund->save();

//            dd($this->fund);

            if (!File::exists(public_path() . '/' . $this->load . '/' . $this->fund->id))
                File::makedirectory(public_path($this->load . '/' . $this->fund->id, 0777));

//            chmod(public_path() . '/' . $this->load . '/' . $f->id, 0755);
        }
//        $row->loaded = now();
//        $row->save();

        return ;
    }

    private function checkPath($row)
    {
        if (!$this->fund || $row->fund != $this->fund->number) {
            if (Funds::where('number', $row->fund)->first())
                $this->fund = Funds::where('number', $row->fund)->first();
            else
                $this->fund =  new Funds();
        }

        if (!$this->inventory || ($row->inventory != ($this->inventory ? $this->inventory->number : null))) {
            if (Inventory::where('number', $row->inventory)->first())
                $this->inventory =  Inventory::where('number', $row->inventory)->first();
            else
                $this->inventory = new Inventory();
        }
        if (!$this->case || ($row->case != ($this->case ? $this->case->number : null))) {
            if (Cases::where('number', $row->case)->first())
                $this->case = Cases::where('number', $row->case)->first();
            else
                $this->case =  new Cases();
        }
        return ;
    }

    private function loadImage($row, $id)
    {

        $img = Image::make(public_path() . '/download/' . $row->fund . '/' . $row->inventory . '/' . $row->case . '/' . $row->page);

        $img->save(public_path() . '/' . $this->load . '/' . $this->fund->id . '/' . $this->inventory->id . '/' . $this->case->id . '/max/' . $row->page);

        $img->resize(250, 250, function ($const) {
            $const->aspectRatio();
        })->save(public_path() . '/' . $this->load . '/' . $this->fund->id . '/' . $this->inventory->id . '/' . $this->case->id . '/medium/' . $row->page);

        $img->resize(80, 80, function ($const) {
            $const->aspectRatio();
        })->save(public_path() . '/' . $this->load . '/' . $this->fund->id . '/' . $this->inventory->id . '/' . $this->case->id . '/thumb/' . $row->page);
    }
}
