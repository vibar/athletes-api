<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $users = User::paginate();

        return UserResource::collection($users);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return UserResource
     */
    public function show(Request $request, int $id)
    {
        $user = User::findOrFail($id);

        return new UserResource($user);
    }

    /**
     * @param Request $request
     * @return UserResource
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());

        return new UserResource($user);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return UserResource
     */
    public function update(Request $request, int $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->all());

        return new UserResource($user);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return UserResource
     */
    public function destroy(Request $request, int $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return new UserResource($user);
    }
}
