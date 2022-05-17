<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTimeInterface;

/**
 * App\Models\Sms
 *
 * @property int $id
 * @property string $phone
 * @property string $active
 * @property ?string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property-read Outbox|null $out
 * @method static \Illuminate\Database\Eloquent\Builder|Sms newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sms newQuery()
 * @method static \Illuminate\Database\Query\Builder|Sms onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Sms query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sms whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sms whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sms whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sms whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sms wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sms whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Sms withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Sms withoutTrashed()
 */
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
