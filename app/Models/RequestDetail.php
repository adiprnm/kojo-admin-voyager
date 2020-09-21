<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestDetail extends Model
{
    use SoftDeletes;

    protected $appends = [
        'formatted_price_per_unit',
        'formatted_total_price'
    ];

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
        'created_at', 'updated_at', 'deleted_at', 'code'
    ];

    /**
     * Get formatted price per unit attribute
     *
     * @return void
     */
    public function getFormattedPricePerUnitAttribute() {
        return formatIdr($this->attributes['price_per_unit']);
    }

    /**
     * Get formatted total price per unit attribute
     *
     * @return void
     */
    public function getFormattedTotalPriceAttribute() {
        return formatIdr($this->attributes['total_price']);
    }
}
