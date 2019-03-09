<?php
/**
 * Created by PhpStorm.
 * User: vladimirkuvanovvgmail.com
 * Date: 10/12/2018
 * Time: 19:46
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Models
 */
class Order extends Model
{


    /**
     * @var string
     */
    protected $table = 'order';

    /**
     * @var array
     */
    protected $fillable = ['product_ids', 'user_id', 'qty', 'amount'];

    protected $casts = ['product_ids' => 'array']; //производит преобразование к определенному типу данных


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getProducts()
    {
        return Product::whereIn('id', $this->product_ids)->get();// получение id товаров из БД (ускоряем работу)
    }
}
