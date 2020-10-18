<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    use SoftDeletes;

    public $additional_attributes = ['order_id', 'disbursement_id', 'total_price', 'code'];

    /**
     * Expenditure request category constant
     */
    const CATEGORY_EXPENDITURE = 'EXPENDITURE';

    /**
     * Purchase request category constant
     */
    const CATEGORY_PURCHASE = 'PURCHASE';

    /**
     * Payroll request category constant
     */
    const CATEGORY_PAYROLL = 'PAYROLL';

    /**
     * Non-production request category constant
     */
    const CATEGORY_NON_PRODUCTION = 'NON_PRODUCTION';

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
     * One to many relationship to request detail
     *
     * @return void
     */
    public function details()
    {
        return $this->hasMany(RequestDetail::class, 'request_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
