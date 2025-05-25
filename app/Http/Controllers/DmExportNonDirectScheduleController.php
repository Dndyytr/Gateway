<?php

namespace App\Http\Controllers;

use App\Models\DmExportNonDirectScheduleModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;

class DmExportNonDirectScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titleMain = "Data Master Export Non Direct Schedule";
        return view('DataMaster.dm-export-non-direct-schedule', compact('titleMain'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titleMain = "Form Create Export Non Direct Schedule";
        return view('DataMaster.dm-export-non-direct-schedule', compact('titleMain'));
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

            return redirect()->route('dm-export-non-direct-schedule.create')->with('success', 'Data saved successful');
        } catch (\Exception $e) {
            return redirect()->route('dm-export-non-direct-schedule.create')->with('error', 'Data saved failed ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DmExportNonDirectScheduleModel $dmExportNonDirectScheduleModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DmExportNonDirectScheduleModel $dmExportNonDirectScheduleModel, $slug)
    {
        // Definisi data dummy secara statis
        $exportsNon = [
            'slug-1' => [
                'slug' => 'slug-1',
                'destination' => 'Tokyo',
                'voyage' => '150V',
                'vessel' => 'ShipTwo',
                'etd_origin' => '2021-01-05',
                'stf/cls' => '2021-01-03',
                'eta_destination' => '2021-02-09',
                'ves_connecting' => 'ShipThree',
                'voy_connecting' => '160V',
                'connecting_city' => 'Yokohama',
                'etd_destination' => '2021-01-09',
            ],
            'slug-2' => [
                'slug' => 'slug-2',
                'destination' => 'Bangkok',
                'voyage' => '190G',
                'vessel' => 'ShipTwo',
                'etd_origin' => '2021-01-05',
                'stf/cls' => '2021-01-03',
                'eta_destination' => '2021-02-09',
                'ves_connecting' => 'ShipThree',
                'voy_connecting' => '180S',
                'connecting_city' => 'Hanoi',
                'etd_destination' => '2021-01-09',
            ],
            'slug-3' => [
                'slug' => 'slug-3',
                'destination' => 'Kuala Lumpur',
                'voyage' => '201G',
                'vessel' => 'ShipTwo',
                'etd_origin' => '2021-01-05',
                'stf/cls' => '2021-01-03',
                'eta_destination' => '2021-02-09',
                'ves_connecting' => 'ShipThree',
                'voy_connecting' => '190S',
                'connecting_city' => 'Kinabalu',
                'etd_destination' => '2021-01-09',
            ],
        ];


        // Cari role berdasarkan slug
        if (!isset($exportsNon[$slug])) {
            return redirect()->route('dm-export-non-direct-schedule.index')
                ->with('error', 'Role not found');
        }

        $exportNon = $exportsNon[$slug];
        $titleMain = ucfirst('Form Edit Export Non Direct Schedule ' . $exportNon['destination']);

        return view('DataMaster.dm-export-non-direct-schedule', compact('titleMain', 'exportNon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DmExportNonDirectScheduleModel $dmExportNonDirectScheduleModel, $slug)
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

            return redirect()->route('dm-export-non-direct-schedule.edit', ['slug' => $slug])->with('success', 'Data updated successful');
        } catch (\Exception $e) {
            return redirect()->route('dm-export-non-direct-schedule.edit', ['slug' => $slug])->with('error', 'Data updated failed ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DmExportNonDirectScheduleModel $dmExportNonDirectScheduleModel)
    {
        return redirect()->route('dm-export-non-direct-schedule.index')->with('success', 'Data Deleted Successful');
    }

    public function getExportNonDirectSchedule(Request $request)
    {
        $exportNon = [
            [
                'slug' => 'slug-1',
                'destination' => 'Tokyo',
                'voyage' => '150V',
                'vessel' => 'ShipTwo',
                'etd_origin' => '2021-01-05',
                'stf/cls' => '2021-01-03',
                'eta_destination' => '2021-02-09',
                'ves_connecting' => 'ShipThree',
                'voy_connecting' => '160V',
                'connecting_city' => 'Yokohama',
                'etd_destination' => '2021-01-09',
            ],
            [
                'slug' => 'slug-2',
                'destination' => 'Bangkok',
                'voyage' => '190G',
                'vessel' => 'ShipTwo',
                'etd_origin' => '2021-01-05',
                'stf/cls' => '2021-01-03',
                'eta_destination' => '2021-02-09',
                'ves_connecting' => 'ShipThree',
                'voy_connecting' => '180S',
                'connecting_city' => 'Hanoi',
                'etd_destination' => '2021-01-09',
            ],
            [
                'slug' => 'slug-3',
                'destination' => 'Kuala Lumpur',
                'voyage' => '201G',
                'vessel' => 'ShipTwo',
                'etd_origin' => '2021-01-05',
                'stf/cls' => '2021-01-03',
                'eta_destination' => '2021-02-09',
                'ves_connecting' => 'ShipThree',
                'voy_connecting' => '190S',
                'connecting_city' => 'Kinabalu',
                'etd_destination' => '2021-01-09',
            ],
        ];

        if (!$request->ajax()) {
            abort(403, 'Unauthorized access'); // Kembalikan error 403 jika bukan AJAX
        }

        $exportsNon = Collection::make($exportNon);

        return DataTables::of($exportsNon)
            ->addIndexColumn()
            ->addColumn('actions', function ($item) {
                return '<span class="flex flex-wrap gap-1 text-white md:justify-end">' .
                    '<a
                        title="Edit"
                        class="rounded-sm bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-warnaBiruHover"
                        href="/dm-export-non-direct-schedule/' . $item['slug'] . '/edit"
                    >' .
                    '<i class="fa-solid fa-pen-to-square mr-1"></i>
                        Edit
                    </a>' .
                    ' <button
                        title="Delete"
                        class="cursor-pointer rounded-sm bg-warnaMerahTombol px-2 py-1 transition-all duration-300 ease-in-out hover:bg-red-300"
                        x-on:click="openDeleteModal(\'/dm-export-non-direct-schedule/' . $item['slug'] . '\')">' .
                    '<i class="fa-solid fa-trash-can mr-1"></i>Delete </button>'
                    . '</span>';
            })
            ->rawColumns(['actions'])
            ->make(true);

    }

    public function import(Request $request)
    {
        $titleMain = "Form Export Non Direct Schedule";
        return view('DataMaster.dm-export-non-direct-schedule', compact('titleMain'));
    }

    public function importStore(Request $request)
    {
        try {
            $validated = $request->validate([
                'file' => 'required|mimes:xlsx,xls,csv|max:2048',
            ]);

            return redirect()->route('dm-export-non-direct-schedule.import')->with('success', 'Data saved successful');
        } catch (\Exception $e) {
            return redirect()->route('dm-export-non-direct-schedule.import')->with('error', 'Data saved failed ' . $e->getMessage());
        }

    }
}
