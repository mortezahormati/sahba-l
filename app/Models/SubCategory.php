<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\SubCategory
 *
 * @property int $id
 * @property string|null $img
 * @property string $name
 * @property string $title
 * @property string $link
 * @property string|null $status
 * @property int|null $parent
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ChildSubCategory[] $child_sub_categories
 * @property-read int|null $child_sub_categories_count
 * @method static \Database\Factories\SubCategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|SubCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|SubCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SubCategory withoutTrashed()
 * @mixin \Eloquent
 */
class SubCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'img', 'link', 'title' , 'status' , 'parent'];


    public function category()
    {
       return $this->belongsTo(Category::class , 'parent' , 'id');
    }
    public function child_sub_categories()
    {
        return $this->hasMany(ChildSubCategory::class , 'sub_parent' , 'id');
    }



}
