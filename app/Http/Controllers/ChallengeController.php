<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChallengeRequest;
use App\Http\Requests\UpdateChallengeRequest;
use App\Http\Resources\ChallengeCollection;
use App\Models\Challenge;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ChallengeController
{
    /**
     * Get a paginated list of challenges with their programs
     *
     * @return \App\Http\Resources\UserCollection
     */
    public function index()
    {
        // Retrieve challenges with their programs and paginate the results
        $challenge = Challenge::with('programs')->paginate(10);

        // Return the paginated list of challenges as a UserCollection resource
        return new ChallengeCollection($challenge);
    }

    /**
     * Store a new challenge.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreChallengeRequest $request)
    {
        try {
            $challenge = Challenge::create($request->all());
            // Return a success response with the challenge data
            return response()->json(['success' => true, 'data' => $challenge]);
        } catch (QueryException $error) {
            // Return a JSON response with an error message and status code 500 if an exception occurs
            return response()->json(['success' => false, 'message' => $error->getMessage()], 500);
        }
    }

    /**
     * Retrieve and display a specific challenge resource.
     *
     * @param int $id The ID of the challenge to retrieve.
     * @return \App\Challenge The retrieved challenge resource.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the challenge is not found.
     */
    public function show($id)
    {
        // return retrieve the challenge with the specified ID and eager load its challenges relationship.
        return Challenge::where('id', $id)->with('programs')->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChallengeRequest $request, Challenge $challenge)
    {
        $challenge->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Challenge $challenge)
    {
        //
        $challenge->delete();
    }
}
