<?php

namespace Cebugle\Totem;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Cebugle\Totem\Traits\HasParameters;

class Frequency extends TotemModel
{
    use HasParameters;

    protected $table = 'task_frequencies';

    protected $fillable = [
        'id',
        'label',
        'interval',
    ];

    /**
     * @return BelongsTo
     */
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
