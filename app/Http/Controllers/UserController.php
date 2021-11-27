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
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'nullable|unique:users,email',
            'document' => 'nullable|integer|digits:9|unique:users,document',
            'address' => 'nullable',
            'phone' => 'nullable|integer|digits:9',
            'birthdate' => 'nullable|date',
            'height' => 'nullable|integer|min:1|max:300',
            'weight' => 'nullable|integer|min:1|max:500',
            'notes' => 'nullable',
            'category_id' => 'required|exists:categories,id',
        ]);

        $user = User::create($request->all());

        return new UserResource($user);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return UserResource
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'nullable|unique:users,email,'.$id,
            'document' => 'nullable|integer|digits:9|unique:users,document,'.$id,
            'address' => 'nullable',
            'phone' => 'nullable|integer|digits:9',
            'birthdate' => 'nullable|date',
            'height' => 'nullable|integer|min:1|max:300',
            'weight' => 'nullable|integer|min:1|max:500',
            'notes' => 'nullable',
            'category_id' => 'required|exists:categories,id',
        ]);

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
