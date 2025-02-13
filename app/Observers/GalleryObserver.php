<?php

namespace App\Observers;

use App\Models\AiLogReport;
use App\Models\Gallery;

class GalleryObserver
{
    /**
     * Handle the Gallery "created" event.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return void
     */
    public function created(Gallery $gallery)
    {
        AiLogReport::create([
            'section' => Gallery::class ,
            'action' => 'created' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $gallery->id,
        ]);
    }

    /**
     * Handle the Gallery "updated" event.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return void
     */
    public function updated(Gallery $gallery)
    {
        AiLogReport::create([
            'section' => Gallery::class ,
            'action' => 'updated' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $gallery->id,
        ]);
    }

    /**
     * Handle the Gallery "deleted" event.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return void
     */
    public function deleted(Gallery $gallery)
    {
        AiLogReport::create([
            'section' => Gallery::class ,
            'action' => 'deleted' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $gallery->id,
        ]);
    }

    /**
     * Handle the Gallery "restored" event.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return void
     */
    public function restored(Gallery $gallery)
    {
        AiLogReport::create([
            'section' => Gallery::class ,
            'action' => 'restored' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $gallery->id,
        ]);
    }

    /**
     * Handle the Gallery "force deleted" event.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return void
     */
    public function forceDeleted(Gallery $gallery)
    {
        AiLogReport::create([
            'section' => Gallery::class ,
            'action' => 'forceDeleted' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $gallery->id,
        ]);
    }
}
