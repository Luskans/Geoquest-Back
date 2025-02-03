<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hint extends Model
{
    protected $fillable = [
        'step_id',
        'order_number',
        'type',
        'content'
    ];

    public function step()
    {
        return $this->belongsTo(Step::class);
    }
}
