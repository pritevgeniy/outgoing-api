<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Outbox;
use App\Http\Resources\OutboxesResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OutgoingController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return OutboxesResource::collection(Outbox::with('out')->get());
    }
}
