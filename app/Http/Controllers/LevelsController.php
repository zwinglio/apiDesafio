<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSheetLevelsRequest;
use App\Http\Resources\SheetLevelsCollection;
use App\Http\Resources\SheetLevelsResource;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sheetLevels = Level::all()->sortBy('id');

        return new SheetLevelsCollection($sheetLevels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSheetLevelsRequest $request)
    {
        $sheetLevels = Level::create($request->all());

        return response()->json([
            'message' => 'SheetLevels created successfully!',
            'data' => new SheetLevelsResource($sheetLevels),
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Level $sheet_level)
    {
        return new LevelResource($sheet_level);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSheetLevelsRequest $request, Level $sheet_level)
    {
        $sheet_level->update($request->all());

        return response()->json([
            'message' => 'SheetLevels updated successfully!',
            'data' => new SheetLevelsResource($sheet_level),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $sheet_level)
    {
        $sheet_level->delete();

        return response()->json([
            'message' => 'SheetLevels deleted successfully!',
            'data' => new SheetLevelsResource($sheet_level),
        ], 200);
    }
}
