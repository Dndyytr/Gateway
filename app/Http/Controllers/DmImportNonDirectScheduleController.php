<?php

namespace App\Http\Controllers;

use App\Models\DmImportNonDirectScheduleModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;

class DmImportNonDirectScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titleMain = "Data Master Import Non Direct Schedule";
        return view('DataMaster.dm-import-non-direct-schedule', compact('titleMain'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titleMain = "Form Create Import Non Direct Schedule";
        return view('DataMaster.dm-import-non-direct-schedule', compact('titleMain'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'destination' => 'required',
                'voyage' => 'required',
                'vessel' => 'required',
                'etd_origin' => 'nullable',
                'stf/cls' => 'nullable',
                'eta_destination' => 'nullable',
                'ves_connecting' => 'required',
                'connecting_city' => 'required',
                'voy_connecting' => 'required',
                'etd_destination' => 'nullable',

            ]);

            return redirect()->route('dm-import-non-direct-schedule.create')->with('success', 'Data saved successful');
        } catch (\Exception $e) {
            return redirect()->route('dm-import-non-direct-schedule.create')->with('error', 'Data saved failed ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DmImportNonDirectScheduleModel $dmImportNonDirectScheduleModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DmImportNonDirectScheduleModel $dmImportNonDirectScheduleModel, $slug)
    {
        // Definisi data dummy secara statis
        $importsNon = [
            'slug-1' => [
                'slug' => 'slug-1',
                'destination' => 'Medan',
                'voyage' => '150V',
                'vessel' => 'ShipTwo',
                'etd_origin' => '2021-01-05',
                'stf/cls' => '2021-01-03',
                'eta_destination' => '2021-02-09',
                'ves_connecting' => 'ShipThree',
                'voy_connecting' => '160V',
                'connecting_city' => 'Jakarta',
                'etd_destination' => '2021-01-09',
            ],
            'slug-2' => [
                'slug' => 'slug-2',
                'destination' => 'Surabaya',
                'voyage' => '190G',
                'vessel' => 'ShipTwo',
                'etd_origin' => '2021-01-05',
                'stf/cls' => '2021-01-03',
                'eta_destination' => '2021-02-09',
                'ves_connecting' => 'ShipThree',
                'voy_connecting' => '180S',
                'connecting_city' => 'Jakarta',
                'etd_destination' => '2021-01-09',
            ],
            'slug-3' => [
                'slug' => 'slug-3',
                'destination' => 'Makassar',
                'voyage' => '201G',
                'vessel' => 'ShipTwo',
                'etd_origin' => '2021-01-05',
                'stf/cls' => '2021-01-03',
                'eta_destination' => '2021-02-09',
                'ves_connecting' => 'ShipThree',
                'voy_connecting' => '190S',
                'connecting_city' => 'Jakarta',
                'etd_destination' => '2021-01-09',
            ],
        ];


        // Cari role berdasarkan slug
        if (!isset($importsNon[$slug])) {
            return redirect()->route('dm-export-non-direct-schedule.index')
                ->with('error', 'Role not found');
        }

        $importNon = $importsNon[$slug];
        $titleMain = ucfirst('Form Edit Import Non Direct Schedule ' . $importNon['destination']);

        return view('DataMaster.dm-import-non-direct-schedule', compact('titleMain', 'importNon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DmImportNonDirectScheduleModel $dmImportNonDirectScheduleModel, $slug)
    {
        try {
            $validated = $request->validate([
                'destination' => 'required',
                'voyage' => 'required',
                'vessel' => 'required',
                'etd_origin' => 'nullable',
                'stf/cls' => 'nullable',
                'eta_destination' => 'nullable',
                'ves_connecting' => 'required',
                'connecting_city' => 'required',
                'voy_connecting' => 'required',
                'etd_destination' => 'nullable',

            ]);

            return redirect()->route('dm-import-non-direct-schedule.edit', ['slug' => $slug])->with('success', 'Data updated successful');
        } catch (\Exception $e) {
            return redirect()->route('dm-import-non-direct-schedule.edit', ['slug' => $slug])->with('error', 'Data updateed failed ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DmImportNonDirectScheduleModel $dmImportNonDirectScheduleModel)
    {
        return redirect()->route('dm-import-non-direct-schedule.index')->with('success', 'Data Deleted Successful');
    }

    public function getImportNonDirectSchedule(Request $request)
    {
        $importNon = [
            [
                'slug' => 'slug-1',
                'destination' => 'Medan',
                'voyage' => '150V',
                'vessel' => 'ShipTwo',
                'etd_origin' => '2021-01-05',
                'stf/cls' => '2021-01-03',
                'eta_destination' => '2021-02-09',
                'ves_connecting' => 'ShipThree',
                'voy_connecting' => '160V',
                'connecting_city' => 'Jakarta',
                'etd_destination' => '2021-01-09',
            ],
            [
                'slug' => 'slug-2',
                'destination' => 'Surabaya',
                'voyage' => '190G',
                'vessel' => 'ShipTwo',
                'etd_origin' => '2021-01-05',
                'stf/cls' => '2021-01-03',
                'eta_destination' => '2021-02-09',
                'ves_connecting' => 'ShipThree',
                'voy_connecting' => '180S',
                'connecting_city' => 'Jakarta',
                'etd_destination' => '2021-01-09',
            ],
            [
                'slug' => 'slug-3',
                'destination' => 'Makassar',
                'voyage' => '201G',
                'vessel' => 'ShipTwo',
                'etd_origin' => '2021-01-05',
                'stf/cls' => '2021-01-03',
                'eta_destination' => '2021-02-09',
                'ves_connecting' => 'ShipThree',
                'voy_connecting' => '190S',
                'connecting_city' => 'Jakarta',
                'etd_destination' => '2021-01-09',
            ],
        ];

        if (!$request->ajax()) {
            abort(403, 'Unauthorized access'); // Kembalikan error 403 jika bukan AJAX
        }

        $importsNon = Collection::make($importNon);

        return DataTables::of($importsNon)
            ->addIndexColumn()
            ->addColumn('actions', function ($item) {
                return '<span class="flex flex-wrap gap-1 text-white md:justify-end">' .
                    '<a
                        title="Edit"
                        class="rounded-sm bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-warnaBiruHover"
                        href="/dm-import-non-direct-schedule/' . $item['slug'] . '/edit"
                    >' .
                    '<i class="fa-solid fa-pen-to-square mr-1"></i>
                        Edit
                    </a>' .
                    ' <button
                        title="Delete"
                        class="cursor-pointer rounded-sm bg-warnaMerahTombol px-2 py-1 transition-all duration-300 ease-in-out hover:bg-red-300"
                        x-on:click="openDeleteModal(\'/dm-import-non-direct-schedule/' . $item['slug'] . '\')">' .
                    '<i class="fa-solid fa-trash-can mr-1"></i>Delete </button>'
                    . '</span>';
            })
            ->rawColumns(['actions'])
            ->make(true);

    }

    public function import(Request $request)
    {
        $titleMain = "Form Import Non Direct Schedule";
        return view('DataMaster.dm-import-non-direct-schedule', compact('titleMain'));
    }

    public function importStore(Request $request)
    {
        try {
            $validated = $request->validate([
                'file' => 'required|mimes:xlsx,xls,csv|max:2048',
            ]);

            return redirect()->route('dm-import-non-direct-schedule.import')->with('success', 'Data saved successful');
        } catch (\Exception $e) {
            return redirect()->route('dm-import-non-direct-schedule.import')->with('error', 'Data saved failed ' . $e->getMessage());
        }

    }
}
