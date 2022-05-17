<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Controllers\Controller;
use App\Http\Requests\SmsRequest;
use App\Http\Resources\Resource;
use App\Models\Sms;

class SmsController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return Resource::collection(Sms::all());
    }

    public function store(SmsRequest $request): Resource
    {
        $posts = Sms::create($request->all());

        return new Resource($posts);
    }

    /**
     * @param SmsRequest $request
     * @param Sms $sms
     * @return Resource
     */
    public function update(SmsRequest $request, Sms $sms): Resource
    {
        $sms->update($request->all());

        return new Resource($sms);
    }

    public function show(Sms $sms): Resource
    {
        return new Resource($sms);
    }

    public function destroy(Sms $sms): string
    {
        $sms->delete();

        return 'Sms deleted successfully';
    }
}
