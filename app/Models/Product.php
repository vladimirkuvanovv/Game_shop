<?php
/**
 * Created by PhpStorm.
 * User: vladimirkuvanovvgmail.com
 * Date: 10/12/2018
 * Time: 19:41
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class Product
 * @package App\Models
 */
class Product extends Model implements HasMedia
{
    use HasMediaTrait, SoftDeletes;
    /**
     * @var string
     */
    protected $table = 'product';

    /**
     * @var array
     */
    protected $fillable = ['name', 'category', 'price', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoryItem()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category');
    }

    /**
     * @return string
     */
    public function getPhotoAttribute()
    {
        $photoUrl = $this->getFirstMediaUrl();

        return empty($photoUrl) ? '/img/no-photo.png' : $photoUrl;
    }


    /**
     * @return string
     */
    public function getUrlAttribute()
    {
        return route('shop.product.detail', [$this->categoryItem->id, $this->id]);
    }
}
