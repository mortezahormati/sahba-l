<?php

namespace App\Observers;

use App\Models\AiLogReport;
use App\Models\SubCategory;

class SubCategoryObserver
{
    /**
     * Handle the SubCategory "created" event.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return void
     */
    public function created(SubCategory $subCategory)
    {
        AiLogReport::create([
            'section' => SubCategory::class ,
            'action' => 'created' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $subCategory->id,
        ]);
    }

    /**
     * Handle the SubCategory "updated" event.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return void
     */
    public function updated(SubCategory $subCategory)
    {
        if($subCategory->isDirty('status')){
            AiLogReport::create([
                'section' => SubCategory::class ,
                'action' => 'status-updated',
                'user_id' => auth()->user()->id ,
                'id_number' =>  $subCategory->id,
            ]);
        }else{
            AiLogReport::create([
                'section' => SubCategory::class ,
                'action' => 'updated',
                'user_id' => auth()->user()->id ,
                'id_number' =>  $subCategory->id,
            ]);
        }

    }

    /**
     * Handle the SubCategory "deleted" event.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return void
     */
    public function deleted(SubCategory $subCategory)
    {
        AiLogReport::create([
            'section' => SubCategory::class ,
            'action' => 'deleted' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $subCategory->id,
        ]);
    }

    /**
     * Handle the SubCategory "restored" event.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return void
     */
    public function restored(SubCategory $subCategory)
    {
        AiLogReport::create([
            'section' => SubCategory::class ,
            'action' => 'restored' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $subCategory->id,
        ]);
    }

    /**
     * Handle the SubCategory "force deleted" event.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return void
     */
    public function forceDeleted(SubCategory $subCategory)
    {
        AiLogReport::create([
            'section' => SubCategory::class ,
            'action' => 'forceDeleted' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $subCategory->id,
        ]);
    }
}
