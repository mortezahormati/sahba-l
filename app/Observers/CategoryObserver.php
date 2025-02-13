<?php

namespace App\Observers;

use App\Models\AiLogReport;
use App\Models\Category;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        AiLogReport::create([
           'section' => Category::class ,
            'action' => 'created' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $category->id,
        ]);
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {

        if($category->isDirty('status')){
            AiLogReport::create([
                'section' => Category::class ,
                'action' => 'status-updated' ,
                'user_id' => auth()->user()->id ,
                'id_number' =>  $category->id,
            ]);
        }else{
            AiLogReport::create([
                'section' => Category::class ,
                'action' => 'updated' ,
                'user_id' => auth()->user()->id ,
                'id_number' =>  $category->id,
            ]);
        }

    }

    /**
     * Handle the Category "deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        AiLogReport::create([
            'section' => Category::class ,
            'action' => 'deleted' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $category->id,
        ]);
    }

    /**
     * Handle the Category "restored" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        AiLogReport::create([
            'section' => Category::class ,
            'action' => 'restored' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $category->id,
        ]);
    }

    /**
     * Handle the Category "force deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        AiLogReport::create([
            'section' => Category::class ,
            'action' => 'forceDeleted' ,
            'user_id' => auth()->user()->id ,
            'id_number' =>  $category->id,
        ]);
    }
}
