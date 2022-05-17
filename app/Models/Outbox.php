<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Outbox
 *
 * @property int $id
 * @property string $out_type
 * @property int $out_id
 * @property string $text
 * @property string $status
 * @property ?string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property-read Model $out
 * @method static \Illuminate\Database\Eloquent\Builder|Outbox newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Outbox newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Outbox query()
 * @method static \Illuminate\Database\Eloquent\Builder|Outbox whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outbox whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outbox whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outbox whereOutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outbox whereOutType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outbox whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outbox whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outbox whereUpdatedAt($value)
 */
class Outbox extends Model
{
    use HasFactory;

    public function out()
    {
        return $this->morphTo();
    }
}
