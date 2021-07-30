<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resturant extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $with = ['client', 'bank'];
    protected $casts = [
        'accepted_payment_methods' => 'array',
        'services' => 'array',
    ];
    public const YES = 'yes';
    public const NO = 'no';

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
}




