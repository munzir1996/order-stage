<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkTime extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get the resturant that owns the WorkTime
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function resturant()
    {
        return $this->belongsTo(Resturant::class);
    }
}
