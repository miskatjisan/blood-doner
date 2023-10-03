<?php

namespace App\Http\Controllers;
use App\Models\Doner;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = Doner::query();

        if ($request->has('div')) {
            $query->where('div', $request->input('div'));
        }

        if ($request->has('dis')) {
            $query->where('dis', $request->input('dis'));
        }

        if ($request->has('area')) {
            $query->where('area', 'like', '%' . $request->input('area') . '%');
        }

        if ($request->has('blood_group')) {
            $query->where('blood_group', $request->input('blood_group'));
        }

        $results = $query->get();

        return response()->json($results);
    }
}
