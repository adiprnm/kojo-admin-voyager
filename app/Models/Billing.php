<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Billing extends Model
{
    /**
     * Paid status constant
     */
    const STATUS_PAID = 'PAID';

    /**
     * Not paid yet status constant
     */
    const STATUS_NOT_PAID_YET = 'NOT_PAID_YET';

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
     * One to one relationship with invoice
     *
     * @return void
     */
    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'id', 'invoice_id');
    }

    /**
     * One to one relationship with cash receipt
     *
     * @return void
     */
    public function dpReceipt()
    {
        return $this->hasOne(CashReceipt::class, 'id', 'dp_receipt_id');
    }

    /**
     * One to one relationship with cash receipt
     *
     * @return void
     */
    public function paidOffReceipt()
    {
        return $this->hasOne(CashReceipt::class, 'id', 'paid_off_receipt_id');
    }
}
