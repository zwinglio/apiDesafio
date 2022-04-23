<?php

namespace App\Http\Controllers;

use App\Models\Sheet;
use Illuminate\Http\Request;
use App\Http\Resources\SheetResource;
use App\Http\Resources\SheetCollection;
use App\Http\Requests\StoreSheetRequest;

class SheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sheets = Sheet::with(['series', 'sheetLevel'])->paginate();

        return new SheetCollection($sheets);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSheetRequest $request)
    {
        $sheet = Sheet::create($request->all());

        return response()->json([
            'message' => 'Sheet created successfully!',
            'data' => new SheetResource($sheet),
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sheet  $sheet
     * @return \Illuminate\Http\Response
     */
    public function show(Sheet $sheet)
    {
        return new SheetResource($sheet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sheet  $sheet
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSheetRequest $request, Sheet $sheet)
    {
        $sheet->update($request->all());

        return response()->json([
            'message' => 'Sheet updated successfully!',
            'data' => new SheetResource($sheet),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sheet  $sheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sheet $sheet)
    {
        $sheet->delete();

        return response()->json([
            'message' => 'Sheet deleted successfully!',
        ], 200);
    }
}
