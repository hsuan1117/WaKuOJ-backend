<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use App\Models\Problem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Pool $pool
     * @return JsonResponse
     */
    public function index(Pool $pool)
    {
        return response()->json($pool->problems);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Pool $pool
     * @return JsonResponse
     */
    public function store(Request $request, Pool $pool)
    {
        $request->validate([
            'type' => 'required|integer|in:0,1,2,3',
            'title' => 'required|string',
            'description' => 'required|string',
            'public' => 'required|boolean'
        ]);

        $problem = $pool->problems()->create([
            ...$request->all(),
            'author' => $request->user()->id
        ]);

        return response()->json($problem);
    }

    /**
     * Display the specified resource.
     *
     * @param Pool $pool
     * @param \App\Models\Problem $problem
     * @return \Illuminate\Http\Response
     */
    public function show(Pool $pool, Problem $problem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Pool $pool
     * @param \App\Models\Problem $problem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pool $pool, Problem $problem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Pool $pool
     * @param \App\Models\Problem $problem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pool $pool, Problem $problem)
    {
        //
    }
}
