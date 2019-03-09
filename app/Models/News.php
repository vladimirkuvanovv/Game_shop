<?php
/**
 * Created by PhpStorm.
 * User: vladimirkuvanovvgmail.com
 * Date: 10/12/2018
 * Time: 19:45
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class News
 * @package App\Models
 */
class News extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    /**
     * @var string
     */
    protected $table = 'news';

    /**
     * @var array
     */
    protected $fillable = ['name', 'description'];

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
        return route('news.detail', $this->id);
    }
}
