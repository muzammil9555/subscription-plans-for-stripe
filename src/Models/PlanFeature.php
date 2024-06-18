<?php

namespace Muzammil9555\SubscriptionPlansForStripe\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id', 'key', 'value'
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
