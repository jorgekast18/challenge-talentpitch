<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Database\QueryException;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;

class UserController
{

    /**
     * Get a paginated list of users with their programs
     *
     * @return \App\Http\Resources\UserCollection
     */
    public function index()
    {
        // Retrieve users with their programs and paginate the results
        $users = User::with('programs')->paginate(10);

        // Return the paginated list of users as a UserCollection resource
        return new UserCollection($users);
    }
    /**
     * Store a new user.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $user = User::create($request->all());
            // Return a success response with the user data
            return response()->json(['success' => true, 'data' => $user]);
        } catch (QueryException $error) {
            // Return a JSON response with an error message and status code 500 if an exception occurs
            return response()->json(['success' => false, 'message' => $error->getMessage()], 500);
        }


    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return \App\Models\User
     */
    public function show($id)
    {
        // Retrieve the user with the specified id and eager load their programs
        $user = User::where('id', $id)->with('programs')->first();

        return $user;
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user){
        $user->update($request->all());
    }

    /**
     * Delete the specified user.
     *
     * @param  User  $user
     * @return void
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}


