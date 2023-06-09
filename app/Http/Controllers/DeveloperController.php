<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\DeveloperRequest;
use Illuminate\Support\Facades\Hash;

class DeveloperController extends Controller
{

    public function index()
    {
        try {
            $developers = User::where('role', 'developer')->get();
            return response()->success(['developers' => $developers]);
        } catch (Exception $e) {
            return response()->error($e->getMessage(), 500);
        }
    }

    public function show(User $developer)
    {
        try {
            return response()->success(['developer' => $developer]);
        } catch (Exception $e) {
            return response()->error($e->getMessage(), 500);
        }
    }

    public function store(DeveloperRequest $request)
    {
        try {

            $requestData = $request->validated();

            // Set a default password if no password is provided in the request
            $requestData['password'] = isset($requestData['password']) ? $requestData['password'] : 'secret_password';

            // Hash the password
            $requestData['password'] = Hash::make($requestData['password']);

            // Create the developer
            $developer = User::create($requestData);

            return response()->success(['developer' => $developer]);
        } catch (Exception $e) {
            return response()->error($e->getMessage(), 500);
        }
    }

    public function update(DeveloperRequest $request, User $developer)
    {
        try {
            $developer->update($request->validated());
            return response()->success(['developer' => $developer]);
        } catch (Exception $e) {
            return response()->error($e->getMessage(), 500);
        }
    }

    public function destroy(User $developer)
    {
        try {
            $developer->delete();
            return response()->success(['message' => 'Developer deleted successfully']);
        } catch (Exception $e) {
            return response()->error($e->getMessage(), 500);
        }
    }

}
