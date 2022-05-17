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
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return Resource::collection(Phone::all());
    }

    /**
     * @param PhoneRequest $request
     * @return Resource
     */
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

    /**
     * @param Phone $phone
     * @return Resource
     */
    public function show(Phone $phone): Resource
    {
        return new Resource($phone);
    }

    /**
     * @param Phone $phone
     * @return string
     */
    public function destroy(Phone $phone): string
    {
        $phone->delete();

        return 'Email deleted successfully';
    }
}
