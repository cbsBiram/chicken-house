<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Carbon\Carbon;

use App\Models\Band;

class DailyStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:daily';

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

            if ($band->status == "start" && $days >= 1) {
                $band->status = "growth";
            }
            elseif ($band->status == "growth" && $days >= 2) {
                $band->status = "finish";
            }
            elseif ($band->status == "finish" && days >= 3) {
                $band->status = "mature";
            }
            $band->save();
        }
        $this->info('Operation is done');
    }
}
