<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OutboxesResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'from' => $this->out::class,
            'to' => $this->out->getValue(),
            'text' => $this->text,
            'status' => $this->status,
        ];
    }
}
