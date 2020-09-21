<?php

namespace App\Models;

use App\Exceptions\DataNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    /**
     * NEW status constant
     */
    const STATUS_NEW = 'NEW';

    /**
     * PROCESSED status constant
     */
    const STATUS_PROCESSED = 'PROCESSED';

    /**
     * REJECTED status constant
     */
    const STATUS_REJECTED = 'REJECTED';

    /**
     * MATERIALIZING status constant
     */
    const STATUS_MATERIALIZING = 'MATERIALIZING';

    /**
     * CUTTING status constant
     */
    const STATUS_CUTTING = 'CUTTING';

    /**
     * SEWING status constant
     */
    const STATUS_SEWING = 'SEWING';

    /**
     * SCREEN_PRINTING status constant
     */
    const STATUS_SCREEN_PRINTING = 'SCREEN_PRINTING';

    /**
     * EMBROIDERING status constant
     */
    const STATUS_EMBROIDERING = 'EMBROIDERING';

    /**
     * BUTTONING status constant
     */
    const STATUS_BUTTONING = 'BUTTONING';

    /**
     * PIPING status constant
     */
    const STATUS_PIPING = 'PIPING';

    /**
     * PACKING status constant
     */
    const STATUS_PACKING = 'PACKING';

    /**
     * COMPLETED status constant
     */
    const STATUS_COMPLETED = 'COMPLETED';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_ref', 'name', 'address', 'phone_number', 'type', 'material', 'total', 'detail', 'due_date', 'design_url', 'order_time', 'status', 'remark', 'notes', 'completed_time'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * Has one relationship with OrderDetail model
     *
     * @return void
     */
    public function details()
    {
        return $this->hasOne(OrderDetail::class, 'order_id', 'id');
    }

    /**
     * Has many relationship with OrderHistory model
     *
     * @return void
     */
    public function histories()
    {
        return $this->hasMany(OrderHistory::class, 'order_id', 'id');
    }


    /**
     * One-to-one relationship with invoice model
     *
     * @return void
     */
    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'order_id', 'id');
    }

    /**
     * Get order or fail
     *
     * @param $conditions
     * @return
     */
    public static function getOrFail($conditions)
    {
        $order = Order::where($conditions)->first();

        if (!$order) {
            throw new DataNotFoundException('Order tidak ditemukan!');
        }

        return $order;
    }

    /**
     * Purchase request
     *
     * @param $query
     * @return void
     */
    public function scopePurchase($query)
    {
        return $query->where('category', 'PURCHASE');
    }

    /**
     * Expenditure request
     *
     * @param $query
     * @return void
     */
    public function scopeExpenditure($query)
    {
        return $query->where('category', 'EXPENDITURE');
    }
}
