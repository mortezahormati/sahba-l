<?php

namespace App\Observers;

use App\Models\AiLogReport;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        AiLogReport::create([
            'section' => User::class ,
            'action' => 'created' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $user->id,
        ]);
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        AiLogReport::create([
            'section' => User::class ,
            'action' => 'updated' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $user->id,
        ]);
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        AiLogReport::create([
            'section' => User::class ,
            'action' => 'deleted' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $user->id,
        ]);
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        AiLogReport::create([
            'section' => User::class ,
            'action' => 'restored' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $user->id,
        ]);
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        AiLogReport::create([
            'section' => User::class ,
            'action' => 'forceDeleted' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $user->id,
        ]);
    }
}
