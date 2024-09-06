<?php

namespace App\Console\Commands;

use App\Jobs\EndAuctionJob;
use App\Models\Product;
use Illuminate\Console\Command;

class CheckAuctionProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-auction-product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command check it is auction finish and call endAuctionJob';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $products = Product::where('finish_date_auction', '<', now())->where('is_active', 0);

        foreach ($products as $product) {
            EndAuctionJob::dispatch($product);
        }


        return 0;
    }
}
