<?php

namespace App\Observers;

use App\Models\AiLogReport;
use App\Models\Brand;

class BrandObserver
{
    /**
     * Handle the Brand "created" event.
     *
     * @param  \App\Models\Brand  $brand
     * @return void
     */
    public function created(Brand $brand)
    {
        AiLogReport::create([
            'section' => Brand::class ,
            'action' => 'created' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $brand->id,
        ]);
    }

    /**
     * Handle the Brand "updated" event.
     *
     * @param  \App\Models\Brand  $brand
     * @return void
     */
    public function updated(Brand $brand)
    {
        if($brand->isDirty('status')){
            AiLogReport::create([
                'section' => Brand::class ,
                'action' => 'status-updated' ,
                'user_id' => auth()->user()->id ,
                'id_number' =>  $brand->id,
            ]);
        }else{
            AiLogReport::create([
                'section' => Brand::class ,
                'action' => 'updated' ,
                'user_id' => auth()->user()->id ,
                'id_number' =>  $brand->id,
            ]);
        }
    }

    /**
     * Handle the Brand "deleted" event.
     *
     * @param  \App\Models\Brand  $brand
     * @return void
     */
    public function deleted(Brand $brand)
    {
        AiLogReport::create([
            'section' => Brand::class ,
            'action' => 'deleted' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $brand->id,
        ]);
    }

    /**
     * Handle the Brand "restored" event.
     *
     * @param  \App\Models\Brand  $brand
     * @return void
     */
    public function restored(Brand $brand)
    {
        AiLogReport::create([
            'section' => Brand::class ,
            'action' => 'restored' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $brand->id,
        ]);
    }

    /**
     * Handle the Brand "force deleted" event.
     *
     * @param  \App\Models\Brand  $brand
     * @return void
     */
    public function forceDeleted(Brand $brand)
    {
        AiLogReport::create([
            'section' => Brand::class ,
            'action' => 'forceDeleted' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $brand->id,
        ]);
    }
}
