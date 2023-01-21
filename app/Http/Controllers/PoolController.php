<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PoolController extends Controller
{
    /**
     * 顯示使用者可控的題庫
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(auth()->user()->pools);
    }

    /**
     * 建立新的題庫
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'public' => 'required|boolean'
        ]);

        return response()->json(auth()->user()->pools()->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Pool $pool
     * @return Response
     */
    public function show(Pool $pool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \App\Models\Pool $pool
     * @return Response
     */
    public function update(Request $request, Pool $pool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Pool $pool
     * @return Response
     */
    public function destroy(Pool $pool)
    {
        //
    }
}
