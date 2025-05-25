<?php

namespace App\Http\Controllers;

use App\Models\DmExportDirectScheduleModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;

class DmExportDirectScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titleMain = "Data Master Export Direct Schedule";
        return view('DataMaster.dm-export-direct-schedule', compact('titleMain'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titleMain = "Form Create Export Direct Schedule";
        return view('DataMaster.dm-export-direct-schedule', compact('titleMain'));
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

            ]);

            return redirect()->route('dm-export-direct-schedule.create')->with('success', 'Data saved successful');
        } catch (\Exception $e) {
            return redirect()->route('dm-export-direct-schedule.create')->with('error', 'Data saved failed ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DmExportDirectScheduleModel $dmExportDirectScheduleModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DmExportDirectScheduleModel $dmExportDirectScheduleModel, $slug)
    {
        // Definisi data dummy secara statis
        $exports = [
            'slug-1' => [
                'slug' => 'slug-1',
                'destination' => 'Hanoi',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            'slug-2' => [
                'slug' => 'slug-2',
                'destination' => 'Tj. Perak',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            'slug-3' => [
                'slug' => 'slug-3',
                'destination' => 'Bangkok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            'slug-4' => [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ]
        ];


        // Cari role berdasarkan slug
        if (!isset($exports[$slug])) {
            return redirect()->route('dm-export-direct-schedule.index')
                ->with('error', 'Role not found');
        }

        $export = $exports[$slug];
        $titleMain = ucfirst('Form Edit Export Direct Schedule ' . $export['destination']);

        return view('DataMaster.dm-export-direct-schedule', compact('titleMain', 'export'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DmExportDirectScheduleModel $dmExportDirectScheduleModel, $slug)
    {
        try {
            $validated = $request->validate([
                'destination' => 'required',
                'voyage' => 'required',
                'vessel' => 'required',
                'etd_origin' => 'nullable',
                'stf/cls' => 'nullable',
                'eta_destination' => 'nullable',

            ]);

            return redirect()->route('dm-export-direct-schedule.edit', ['slug' => $slug])->with('success', 'Data updated successful');
        } catch (\Exception $e) {
            return redirect()->route('dm-export-direct-schedule.edit', ['slug' => $slug])->with('error', 'Data updated failed ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DmExportDirectScheduleModel $dmExportDirectScheduleModel)
    {
        return redirect()->route('dm-export-direct-schedule.index')->with('success', 'Data Deleted Successful');
    }

    public function getExportDirectSchedule(Request $request)
    {
        $export = [
            [
                'slug' => 'slug-1',
                'destination' => 'Hanoi',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-2',
                'destination' => 'Tj. Perak',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-3',
                'destination' => 'Bangkok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Tj. Priok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2022-02-12',
                'stf/cls' => '2022-02-02',
                'eta_destination' => '2022-02-12',
            ],
        ];

        if (!$request->ajax()) {
            abort(403, 'Unauthorized access'); // Kembalikan error 403 jika bukan AJAX
        }

        $exports = Collection::make($export);

        return DataTables::of($exports)
            ->addIndexColumn()
            ->addColumn('actions', function ($item) {
                return '<span class="flex flex-wrap gap-1 text-white md:justify-end">' .
                    '<a
                        title="Edit"
                        class="rounded-sm bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-warnaBiruHover"
                        href="/dm-export-direct-schedule/' . $item['slug'] . '/edit"
                    >' .
                    '<i class="fa-solid fa-pen-to-square mr-1"></i>
                        Edit
                    </a>' .
                    ' <button
                        title="Delete"
                        class="cursor-pointer rounded-sm bg-warnaMerahTombol px-2 py-1 transition-all duration-300 ease-in-out hover:bg-red-300"
                        x-on:click="openDeleteModal(\'/dm-export-direct-schedule/' . $item['slug'] . '\')">' .
                    '<i class="fa-solid fa-trash-can mr-1"></i>Delete </button>'
                    . '</span>';
            })
            ->rawColumns(['actions'])
            ->make(true);

    }

    public function import(Request $request)
    {
        $titleMain = "Form Export Direct Schedule";
        return view('DataMaster.dm-export-direct-schedule', compact('titleMain'));
    }

    public function importStore(Request $request)
    {
        try {
            $validated = $request->validate([
                'file' => 'required|mimes:xlsx,xls,csv|max:2048',
            ]);

            return redirect()->route('dm-export-direct-schedule.import')->with('success', 'Data saved successful');
        } catch (\Exception $e) {
            return redirect()->route('dm-export-direct-schedule.import')->with('error', 'Data saved failed ' . $e->getMessage());
        }

    }
}
