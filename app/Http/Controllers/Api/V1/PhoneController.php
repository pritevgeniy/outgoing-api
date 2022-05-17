<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Controllers\Controller;
use App\Http\Requests\PhoneRequest;
use App\Http\Resources\Resource;
use App\Models\Phone;

class PhoneController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return Resource::collection(Phone::all());
    }

    public function store(PhoneRequest $request): Resource
    {
        $posts = Phone::create($request->all());

        return new Resource($posts);
    }

    /**
     * @param PhoneRequest $request
     * @param Phone $phone
     * @return Resource
     */
    public function update(PhoneRequest $request, Phone $phone): Resource
    {
        $phone->update($request->all());

        return new Resource($phone);
    }

    public function show(Phone $phone)
    {
        return response()->json([new Resource($phone)]);
    }

    public function destroy(Phone $phone)
    {
        $phone->delete();

        return response()->json('Email deleted successfully');
    }
}
