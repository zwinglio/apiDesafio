<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Sheet;
use App\Imports\SheetImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
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
        if (request()->has('sheet_level')) {
            $sheetLevel = request()
                ->get('sheet_level');

            $sheetLevelId = Level::where('name', 'ilike', $sheetLevel)
                ->firstOrFail()
                ->id;

            $sheets = Sheet::with(['series', 'level'])
                ->where('level_id', $sheetLevelId)
                ->paginate(10);
        } else {
            $sheets = Sheet::with(['series', 'level'])->orderBy('id')->paginate(10);
        }

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
        $sheet = Sheet::with(['level', 'series'])->findOrFail($sheet->id);
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

    public function importSheets(Request $request)
    {
        $sheetsExcel = $request->file('sheets');

        Excel::import(new SheetImport, $sheetsExcel);

        return response()->json([
            'message' => 'Sheets imported successfully!',
        ], 200);
    }
}
