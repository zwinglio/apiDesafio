<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Sheet;
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
    public function index(Sheet $sheet)
    {
        return new SerieCollection($sheet->series);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Sheet $sheet, StoreSerieRequest $request)
    {
        $serie = Serie::create([
            'title' => $request->get('title'),
            'instructions' => $request->get('instructions'),
            'repetitions' => $request->get('repetitions'),
            'sheet_id' => $sheet->id,
        ]);

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
    public function show(Sheet $sheet, Serie $series)
    {
        $series = Serie::where('id', $series->id)->first();
        return new SerieResource($series);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSerieRequest $request, Sheet $sheet, Serie $series)
    {
        $series->update($request->all());

        return response()->json([
            'message' => 'Serie updated successfully!',
            'data' => new SerieResource($series),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sheet $sheet, Serie $series)
    {
        $series->delete();
        return response()->json([
            'message' => 'Serie deleted successfully!',
            'data' => new SerieResource($series),
        ], 200);
    }
}
