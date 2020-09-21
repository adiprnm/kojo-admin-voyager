<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClothingType extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'description'
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
     * Many-to-many relationship with clothing material
     *
     * @return void
     */
    public function materials()
    {
        return $this->belongsToMany(ClothingMaterial::class,
                                    'clothing_material_type',
                                    'type_id',
                                    'material_id');
    }

    /**
     * Many-to-many relationship with clothing button
     *
     * @return void
     */
    public function buttons()
    {
        return $this->belongsToMany(ClothingButton::class,
                                    'clothing_type_button',
                                    'type_id',
                                    'button_id');
    }

    /**
     * Many-to-many relationship with clothing kur ropes
     *
     * @return void
     */
    public function kurRopes()
    {
        return $this->belongsToMany(ClothingKurRope::class,
                                    'clothing_type_kur_rope',
                                    'type_id',
                                    'kur_rope_id');
    }

    /**
     * Many-to-many relationship with clothing purings
     *
     * @return void
     */
    public function purings()
    {
        return $this->belongsToMany(ClothingPuring::class,
                                    'clothing_type_puring',
                                    'type_id',
                                    'puring_id');
    }

    /**
     * Many-to-many relationship with clothing screen printings
     *
     * @return void
     */
    public function screenPrintings()
    {
        return $this->belongsToMany(ClothingScreenPrinting::class,
                                    'clothing_type_screen_printing',
                                    'type_id',
                                    'screen_printing_id');
    }

    /**
     * Many-to-many relationship with clothing stoppers
     *
     * @return void
     */
    public function stoppers()
    {
        return $this->belongsToMany(ClothingStopper::class,
                                    'clothing_type_stopper',
                                    'type_id',
                                    'stopper_id');
    }

    /**
     * Many-to-many relationship with clothing zipper
     *
     * @return void
     */
    public function zippers()
    {
        return $this->belongsToMany(ClothingZipper::class,
                                    'clothing_type_zipper',
                                    'type_id',
                                    'zipper_id');
    }
}
