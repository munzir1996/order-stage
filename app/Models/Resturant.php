<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resturant extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $with = ['client', 'banks', 'workTime', 'location', 'loyalityPoint', 'resturantSubcategories'];
    protected $casts = [
        'accepted_payment_methods' => 'array',
        'services' => 'array',
    ];
    public const YES = 'نعم';
    public const NO = 'لا';

    /**
     * Get the client that owns the Resturant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get all of the banks for the Resturant
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function banks()
    {
        return $this->hasMany(Bank::class);
    }

    /**
     * Get the workTime associated with the Resturant
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function workTime()
    {
        return $this->hasOne(WorkTime::class);
    }

    /**
     * Get the location associated with the Resturant
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function location()
    {
        return $this->hasOne(Location::class);
    }

    /**
     * Get the loyalityPoint associated with the Resturant
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function loyalityPoint()
    {
        return $this->hasOne(LoyalityPoint::class);
    }

    /**
     * Get all of the resturantSubcategories for the Resturant
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resturantSubcategories()
    {
        return $this->hasMany(ResturantSubcategory::class);
    }
}




