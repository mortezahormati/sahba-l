<?php

namespace App\Observers;

use App\Models\AiLogReport;
use App\Models\Brand;
use App\Models\Warranty;

class WarrantyObserevr
{
    /**
     * Handle the Warranty "created" event.
     *
     * @param  \App\Models\Warranty  $warranty
     * @return void
     */
    public function created(Warranty $warranty)
    {
        AiLogReport::create([
            'section' => Warranty::class ,
            'action' => 'created' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $warranty->id,
        ]);
    }

    /**
     * Handle the Warranty "updated" event.
     *
     * @param  \App\Models\Warranty  $warranty
     * @return void
     */
    public function updated(Warranty $warranty)
    {
        if($warranty->isDirty('status')){
            AiLogReport::create([
                'section' => Warranty::class ,
                'action' => 'status-updated' ,
                'user_id' => auth()->user()->id ,
                'id_number' =>  $warranty->id,
            ]);
        }else{
            AiLogReport::create([
                'section' => Warranty::class ,
                'action' => 'updated' ,
                'user_id' => auth()->user()->id ,
                'id_number' =>  $warranty->id,
            ]);
        }
    }

    /**
     * Handle the Warranty "deleted" event.
     *
     * @param  \App\Models\Warranty  $warranty
     * @return void
     */
    public function deleted(Warranty $warranty)
    {
        AiLogReport::create([
            'section' => Warranty::class ,
            'action' => 'deleted' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $warranty->id,
        ]);
    }

    /**
     * Handle the Warranty "restored" event.
     *
     * @param  \App\Models\Warranty  $warranty
     * @return void
     */
    public function restored(Warranty $warranty)
    {
        AiLogReport::create([
            'section' => Warranty::class ,
            'action' => 'deleted' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $warranty->id,
        ]);
    }

    /**
     * Handle the Warranty "force deleted" event.
     *
     * @param  \App\Models\Warranty  $warranty
     * @return void
     */
    public function forceDeleted(Warranty $warranty)
    {
        AiLogReport::create([
            'section' => Warranty::class ,
            'action' => 'restored' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $warranty->id,
        ]);
    }
}
