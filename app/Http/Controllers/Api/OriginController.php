<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Origin;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OriginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $data = Origin::all();

        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Origin $taskOrigin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Origin $taskOrigin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Origin $taskOrigin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Origin $taskOrigin)
    {
        //
    }
}
