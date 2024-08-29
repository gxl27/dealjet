<?php

namespace App\Models;

use App\Enums\ClientStatus;
use App\Enums\Source;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = [
        'status_alias',
        'source_alias',
    ];

    protected $hidden = [
        'status',
        'source'
    ];

    protected function casts(): array
    {
        return [
            'status' => ClientStatus::class,
            'source' => Source::class,
        ];
    }

    public function getStatusAliasAttribute()
    {
        return $this->status->toArray();
    }

    public function getSourceAliasAttribute()
    {
        return $this->source->toArray();
    }

}
