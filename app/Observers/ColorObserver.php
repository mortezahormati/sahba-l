<?php

namespace App\Observers;

use App\Models\AiLogReport;
use App\Models\Color;

class ColorObserver
{
    /**
     * Handle the Color "created" event.
     *
     * @param  \App\Models\Color  $color
     * @return void
     */
    public function created(Color $color)
    {
        AiLogReport::create([
            'section' => Color::class ,
            'action' => 'created' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $color->id,
        ]);
    }

    /**
     * Handle the Color "updated" event.
     *
     * @param  \App\Models\Color  $color
     * @return void
     */
    public function updated(Color $color)
    {
        AiLogReport::create([
            'section' => Color::class ,
            'action' => 'updated' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $color->id,
        ]);
    }

    /**
     * Handle the Color "deleted" event.
     *
     * @param  \App\Models\Color  $color
     * @return void
     */
    public function deleted(Color $color)
    {
        AiLogReport::create([
            'section' => Color::class ,
            'action' => 'deleted' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $color->id,
        ]);
    }

    /**
     * Handle the Color "restored" event.
     *
     * @param  \App\Models\Color  $color
     * @return void
     */
    public function restored(Color $color)
    {
        AiLogReport::create([
            'section' => Color::class ,
            'action' => 'restored' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $color->id,
        ]);
    }

    /**
     * Handle the Color "force deleted" event.
     *
     * @param  \App\Models\Color  $color
     * @return void
     */
    public function forceDeleted(Color $color)
    {
        AiLogReport::create([
            'section' => Color::class ,
            'action' => 'forceDeleted' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $color->id,
        ]);
    }
}
