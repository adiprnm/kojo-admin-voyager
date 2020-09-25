<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashDisbursement extends Model
{
    use SoftDeletes;

    public $additional_attributes = ['request_id', 'code'];

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
     * One-to-many relationship with cash disbursement detail
     *
     * @return void
     */
    public function details()
    {
        return $this->hasMany(CashDisbursementDetail::class, 'cash_disbursement_id', 'id');
    }

    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id');
    }
}
