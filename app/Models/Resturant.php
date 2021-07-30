<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Resturant extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $guarded = [];
    protected $with = ['client', 'bank', 'workTime', 'location', 'loyalityPoint', 'resturantSubcategories'];
    protected $casts = [
        'accepted_payment_methods' => 'array',
        'services' => 'array',
    ];
    public const YES = 'نعم';
    public const NO = 'لا';

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('authorization')->singleFile();
        $this->addMediaCollection('commercial_register')->singleFile();
        $this->addMediaCollection('resturant')->singleFile();
    }

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
     * Get the bank associated with the Resturant
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bank()
    {
        return $this->hasOne(Bank::class);
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




