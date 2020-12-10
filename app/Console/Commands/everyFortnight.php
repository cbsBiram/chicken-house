<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Carbon\Carbon;

use App\Models\Band;

class everyFortnight extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fortnight:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will update the status of bands';

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
        $bands = Band::all();
        $today = Carbon::today();
        foreach ($bands as $key => $band) {
            $start = Carbon::parse($band->created_date);
            $days = $today->diffInDays($start);

            if ($band->status == "start" && $days >= 14) {
                $band->status = "growth";
            }
            elseif ($band->status == "growth" && $days >= 29) {
                $band->status = "finish";
            }
            elseif ($band->status == "finish" && days >= 44) {
                $band->status = "mature";
            }
            $band->save();
        }
        echo 'Operation is done';
    }
}
