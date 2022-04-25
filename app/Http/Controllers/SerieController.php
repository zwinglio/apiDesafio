<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use App\Http\Resources\SerieResource;
use App\Http\Resources\SerieCollection;
use App\Http\Requests\StoreSerieRequest;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->has('sheet_id')) {
            $series = Serie::with(['sheet', 'exercises'])
                ->where('sheet_id', request()->sheet_id)
                ->orderBy('id')
                ->paginate();
        } else {
            $series = Serie::with(['sheet', 'exercises'])
                ->orderBy('id')
                ->paginate();
        }

        return new SerieCollection($series);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSerieRequest $request)
    {
        $serie = Serie::create($request->all());

        return response()->json([
            'message' => 'Serie created successfully!',
            'data' => new SerieResource($serie),
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function show(Serie $series)
    {
        $serie = Serie::with(['sheet', 'exercises'])->findOrFail($series->id);
        return new SerieResource($serie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSerieRequest $request, Serie $series)
    {
        $serie = Serie::findOrFail($series->id);
        $serie->update($request->all());

        return response()->json([
            'message' => 'Serie updated successfully!',
            'data' => new SerieResource($serie),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serie $series)
    {
        $series->delete();
        return response()->json([
            'message' => 'Serie deleted successfully!',
            'data' => new SerieResource($series),
        ], 200);
    }
}
