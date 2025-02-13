<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ChildSubCategory
 *
 * @property int $id
 * @property string|null $img
 * @property string $name
 * @property string $title
 * @property string $link
 * @property string $status
 * @property int|null $sub_parent
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\SubCategory|null $subCategory
 * @method static \Database\Factories\ChildSubCategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildSubCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildSubCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|ChildSubCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildSubCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildSubCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildSubCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildSubCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildSubCategory whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildSubCategory whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildSubCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildSubCategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildSubCategory whereSubParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildSubCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildSubCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ChildSubCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ChildSubCategory withoutTrashed()
 * @mixin \Eloquent
 */
class ChildSubCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'img', 'link', 'title' , 'status' , 'sub_parent'];


    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class , 'sub_parent' , 'id');
    }

}
