<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestRealization extends Model
{
    use SoftDeletes;

    const CATEGORY_PURCHASE = 'PURCHASE';
    const CATEGORY_EXPENDITURE = 'EXPENDITURE';
    const CATEGORY_PAYROLL = 'PAYROLL';

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

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
