<?php

namespace App\Observers;

use App\Models\AiLogReport;
use App\Models\UserAddress;

class UserAddressObserver
{
    /**
     * Handle the UserAddress "created" event.
     *
     * @param  \App\Models\UserAddress  $userAddress
     * @return void
     */
    public function created(UserAddress $userAddress)
    {
        AiLogReport::create([
            'section' => UserAddress::class ,
            'action' => 'created' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $userAddress->id,
        ]);
    }

    /**
     * Handle the UserAddress "updated" event.
     *
     * @param  \App\Models\UserAddress  $userAddress
     * @return void
     */
    public function updated(UserAddress $userAddress)
    {
        AiLogReport::create([
            'section' => UserAddress::class ,
            'action' => 'updated' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $userAddress->id,
        ]);
    }

    /**
     * Handle the UserAddress "deleted" event.
     *
     * @param  \App\Models\UserAddress  $userAddress
     * @return void
     */
    public function deleted(UserAddress $userAddress)
    {
        AiLogReport::create([
            'section' => UserAddress::class ,
            'action' => 'deleted' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $userAddress->id,
        ]);
    }

    /**
     * Handle the UserAddress "restored" event.
     *
     * @param  \App\Models\UserAddress  $userAddress
     * @return void
     */
    public function restored(UserAddress $userAddress)
    {
        AiLogReport::create([
            'section' => UserAddress::class ,
            'action' => 'restored' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $userAddress->id,
        ]);
    }

    /**
     * Handle the UserAddress "force deleted" event.
     *
     * @param  \App\Models\UserAddress  $userAddress
     * @return void
     */
    public function forceDeleted(UserAddress $userAddress)
    {
        AiLogReport::create([
            'section' => UserAddress::class ,
            'action' => 'forceDeleted' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $userAddress->id,
        ]);
    }
}
