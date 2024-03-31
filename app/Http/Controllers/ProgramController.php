<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreProgramRequest;

use App\Http\Requests\UpdateProgramRequest;
use Illuminate\Database\QueryException;
use App\Http\Resources\ProgramCollection;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        // Retrieve paginated programs
        $programs = Program::with('users', 'companies', 'challenges')->paginate(10);

        // Return collection of programs
        return new ProgramCollection($programs);
    }

    /**
     * Store a newly created resource in program.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProgramRequest $request)
    {
        try {
            $program = Program::create($request->all());

            // Return a success response with the program data
            return response()->json(['success' => true, 'data' => $program]);
        } catch (QueryException $error) {
            // Return a JSON response with an error message and status code 500 if a query exception occurs
            return response()->json(['success' => false, 'message' => $error->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $programFound = Program::where('id', $id)->with('users', 'companies', 'challenges')->first();

        return $programFound;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgramRequest $request,  Program $program)
    {
        $program->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        //
        $program->delete();
    }
}
