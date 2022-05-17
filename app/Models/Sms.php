<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTimeInterface;

class Sms extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['phone', 'active'];

    public function out(): MorphOne
    {
        return $this->morphOne(Outbox::class, 'out');
    }

    public function getValue(): string
    {
        return $this->phone;
    }

    /**
     * @param  DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
