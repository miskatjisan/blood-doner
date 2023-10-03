<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requestdonate;

class RequestDonateController extends Controller
{
    public function index()
    {
        return Requestdonate::all();
    }

    public function store(Request $request)
    {
        return Requestdonate::create($request->all());
    }
}
