<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashReceipt extends Model
{
    public $additional_attributes = ['order_id', 'code'];

    /**
     * On hand type constant
     */
    const TYPE_ON_HAND = 'ON_HAND';

    /**
     * On bank type constant
     */
    const TYPE_ON_BANK = 'ON_BANK';

    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * Relation to order
     *
     * @return void
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
