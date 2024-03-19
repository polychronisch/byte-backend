<?php

namespace App\Http\Controllers;

use App\Http\Requests\DegreeRequest;
use App\Models\Degree;
use Illuminate\Http\Request;

class DegreeController extends Controller
{
    public function index()
    {
        $degrees = Degree::all();
        return response()->json($degrees);
    }

    public function store(DegreeRequest $request)
    {
        $validatedData = $request->validated();
        if($validatedData){
            Degree::create($validatedData);
            return response()->json(['message' => 'Candidate saved successfully'], 200);
        }
    }
}
