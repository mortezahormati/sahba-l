<?php

namespace App\Observers;

use App\Models\AiLogReport;
use App\Models\ChildSubCategory;

class ChildSubCategoryObserver
{
    /**
     * Handle the ChildSubCategory "created" event.
     *
     * @param  \App\Models\ChildSubCategory  $childSubCategory
     * @return void
     */
    public function created(ChildSubCategory $childSubCategory)
    {
        AiLogReport::create([
            'section' => ChildSubCategory::class ,
            'action' => 'created' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $childSubCategory->id,
        ]);
    }

    /**
     * Handle the ChildSubCategory "updated" event.
     *
     * @param  \App\Models\ChildSubCategory  $childSubCategory
     * @return void
     */
    public function updated(ChildSubCategory $childSubCategory)
    {
        if($childSubCategory->isDirty('status')){
            AiLogReport::create([
                'section' => ChildSubCategory::class ,
                'action' => 'status-updated' ,
                'user_id' => auth()->user()->id ,
                'id_number' =>  $childSubCategory->id,
            ]);
        }else{
            AiLogReport::create([
                'section' => ChildSubCategory::class ,
                'action' => 'updated' ,
                'user_id' => auth()->user()->id ,
                'id_number' =>  $childSubCategory->id,
            ]);
        }
    }

    /**
     * Handle the ChildSubCategory "deleted" event.
     *
     * @param  \App\Models\ChildSubCategory  $childSubCategory
     * @return void
     */
    public function deleted(ChildSubCategory $childSubCategory)
    {
        AiLogReport::create([
            'section' => ChildSubCategory::class ,
            'action' => 'deleted' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $childSubCategory->id,
        ]);
    }

    /**
     * Handle the ChildSubCategory "restored" event.
     *
     * @param  \App\Models\ChildSubCategory  $childSubCategory
     * @return void
     */
    public function restored(ChildSubCategory $childSubCategory)
    {
        AiLogReport::create([
            'section' => ChildSubCategory::class ,
            'action' => 'restored' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $childSubCategory->id,
        ]);
    }

    /**
     * Handle the ChildSubCategory "force deleted" event.
     *
     * @param  \App\Models\ChildSubCategory  $childSubCategory
     * @return void
     */
    public function forceDeleted(ChildSubCategory $childSubCategory)
    {
        AiLogReport::create([
            'section' => ChildSubCategory::class ,
            'action' => 'forceDeleted' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $childSubCategory->id,

        ]);
    }
}
