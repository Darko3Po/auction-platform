<?php

namespace App\Jobs;

use App\Models\Bidding;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class EndAuctionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $product;
    protected $bid;

    /**
     * Create a new job instance.
     */
    public function __construct(Product $product, Bidding $bid)
    {
        $this->product = $product;
        $this->bid = $bid;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->product->finish_date_auction < now() && $this->product->is_active == 1) {
            $this->product->is_active = 0;
            $this->product->save();
         }

         $highest_bid= Bidding::where('id', $this->product->id)->orderByDesc('bid_price')->first();

         $order = new Orders();
         $order->user_id = $highest_bid->user_id;
         $order->product_id = $highest_bid->product_id;
         $order->price =  $highest_bid->bid_price;
         $order->save();





    }
}
