<?php

namespace App\Http\Controllers;

use App\Http\Requests\DegreeRequest;
use App\Models\Candidate;
use App\Models\Degree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DegreeController extends Controller
{
    public function index()
    {
        $degrees = Degree::all();
        $degrees_used = DB::table('candidates')
        ->select('degree_id')
        ->groupBy('degree_id')
        ->get();
        return response()->json(['degrees'=>$degrees,'degrees_used'=>$degrees_used]);
    }

    public function store(DegreeRequest $request)
    {
        $validatedData = $request->validated();
        if($validatedData){
            Degree::create($validatedData);
            return response()->json(['message' => 'Candidate saved successfully'], 200);
        }
    }
    public function delete($id)
    {
        Degree::where('id', $id)->first()->delete();
    }
}
