<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreCompanyRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Resources\CompanyCollection;
use App\Models\Company;

class CompanyController
{
    /**
     * Get a paginated list of companies with their programs
     *
     * @return \App\Http\Resources\UserCollection
     */
    public function index()
    {
        // Retrieve companies with their programs and paginate the results
        $company = Company::with('programs')->paginate(10);

        // Return the paginated list of companies as a UserCollection resource
        return new CompanyCollection($company);
    }

    /**
     * Store a new company.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreCompanyRequest $request)
    {
        try {
            // Create a new company
            $company = Company::create($request->all());

            // Return a success response with the company data
            return response()->json(['success' => true, 'data' => $company]);
        } catch (QueryException $error) {
            // Return a JSON response with an error message and status code 500 if an exception occurs
            return response()->json(['success' => false, 'message' => $error->getMessage()], 500);
        }
    }

    /**
     * Retrieve and display the specified resource.
     *
     * @param int $id The ID of the resource to retrieve.
     * @return \Illuminate\Database\Eloquent\Model The retrieved resource.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the resource is not found.
     */
    public function show($id)
    {
        // Retrieve the company with the specified ID and eager load the associated programs.
        return Company::findOrFail($id)->with('programs')->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        //
        $company->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
        $company->delete();
    }
}
