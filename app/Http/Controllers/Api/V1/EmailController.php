<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use App\Http\Resources\Resource;
use App\Models\Email;

class EmailController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return Resource::collection(Email::all());
    }

    public function store(EmailRequest $request): Resource
    {
        $posts = Email::create($request->all());

        return new Resource($posts);
    }

    /**
     * @param EmailRequest $request
     * @param Email $email
     * @return Resource
     */
    public function update(EmailRequest $request, Email $email): Resource
    {
        $email->update($request->all());

        return new Resource($email);
    }

    public function show(Email $email)
    {
        return response()->json([new Resource($email)]);
    }

    public function destroy(Email $email)
    {
        $email->delete();

        return response()->json('Email deleted successfully');
    }
}
