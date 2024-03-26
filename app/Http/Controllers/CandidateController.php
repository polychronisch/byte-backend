<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Requests\CandidateRequest;
use App\Http\Requests\CandidateUpdateRequest;

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
        ->get(); 
        return response()->json($candidates);
    }

    public function show($id)
    {
        $candidate = Candidate::join('degrees', 'candidates.degree_id', '=', 'degrees.id')
        ->select('candidates.*', 'degrees.degreeTitle')->where('candidates.id',$id)
        ->first();
        return response()->json($candidate);
    }

    public function delete($id)
    {    
        Candidate::where('id', $id)->first()->delete();
    }

    public function update(CandidateUpdateRequest $request,$id)
    {    
        $candidate = Candidate::find($id);
        if (!$candidate) {
            return response()->json(['message' => 'Candidate not found'], 404);
        }

        $candidate->update($request->all());

        return response()->json(['message' => 'Candidate updated successfully', 'candidate' => $candidate]);
    }
}
