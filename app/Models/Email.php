<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTimeInterface;

class Email extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['email', 'active'];

    public function out(): MorphOne
    {
        return $this->morphOne(Outbox::class, 'out');
    }

    public function getValue(): string
    {
        return $this->email;
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
