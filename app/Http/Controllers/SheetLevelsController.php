<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSheetLevelsRequest;
use App\Http\Resources\SheetLevelsCollection;
use App\Http\Resources\SheetLevelsResource;
use App\Models\SheetLevels;
use Illuminate\Http\Request;

class SheetLevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sheetLevels = SheetLevels::all()->sortBy('id');

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
        $sheetLevels = SheetLevels::create($request->all());

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
    public function show(SheetLevels $sheet_level)
    {
        return new SheetLevelsResource($sheet_level);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSheetLevelsRequest $request, SheetLevels $sheet_level)
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
    public function destroy(SheetLevels $sheet_level)
    {
        $sheet_level->delete();

        return response()->json([
            'message' => 'SheetLevels deleted successfully!',
            'data' => new SheetLevelsResource($sheet_level),
        ], 200);
    }
}
