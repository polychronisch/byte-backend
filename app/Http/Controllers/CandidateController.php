<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Requests\CandidateRequest;

class CandidateController extends Controller
{
    public function store(CandidateRequest $request)
    {
        $validatedData = $request->validated();
        if($validatedData){
            Candidate::create($validatedData);
            return response()->json(['message' => 'Candidate saved successfully'], 200);
        }
        
    }

    public function index()
    {
        $candidates = Candidate::join('degrees', 'candidates.degree_id', '=', 'degrees.id')
        ->select('candidates.*', 'degrees.degreeTitle')
        ->get(); // Retrieve all candidates
        return response()->json($candidates);
    }

    public function delete($id){    
        Candidate::where('id', $id)->first()->delete();
    }
}
