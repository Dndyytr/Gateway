<?php

namespace App\Http\Controllers;

use App\Models\DmImportDirectScheduleModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;

class DmImportDirectScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titleMain = "Data Master Import Direct Schedule";
        return view('DataMaster.dm-import-direct-schedule', compact('titleMain'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titleMain = "Form Create Import Direct Schedule";
        return view('DataMaster.dm-import-direct-schedule', compact('titleMain'));
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

            return redirect()->route('dm-import-direct-schedule.create')->with('success', 'Data saved successful');
        } catch (\Exception $e) {
            return redirect()->route('dm-import-direct-schedule.create')->with('error', 'Data saved failed ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DmImportDirectScheduleModel $dmImportDirectScheduleModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DmImportDirectScheduleModel $dmImportDirectScheduleModel, $slug)
    {
        // Definisi data dummy secara statis
        $imports = [
            'slug-1' => [
                'slug' => 'slug-1',
                'destination' => 'Jakarta',
                'voyage' => '2109S',
                'vessel' => 'RIO GRANDE',
                'etd_origin' => '2022-05-17',
                'stf/cls' => '2022-05-15',
                'eta_destination' => '2022-05-19',
            ],
            'slug-2' => [
                'slug' => 'slug-2',
                'destination' => 'Tokyo',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2021-02-02',
                'stf/cls' => '2021-02-02',
                'eta_destination' => '2021-02-02',
            ],
            'slug-3' => [
                'slug' => 'slug-3',
                'destination' => 'Yokohama',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2021-02-02',
                'stf/cls' => '2021-02-02',
                'eta_destination' => '2021-02-02',
            ],
            'slug-4' => [
                'slug' => 'slug-4',
                'destination' => 'Hanoi',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2021-02-02',
                'stf/cls' => '2021-02-02',
                'eta_destination' => '2021-02-02',
            ],
            'slug-5' => [
                'slug' => 'slug-5',
                'destination' => 'Bangkok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2021-02-02',
                'stf/cls' => '2021-02-02',
                'eta_destination' => '2021-02-02',
            ],
            'slug-6' => [
                'slug' => 'slug-6',
                'destination' => 'Kuala Lumpur',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2021-02-02',
                'stf/cls' => '2021-02-02',
                'eta_destination' => '2021-02-02',
            ],

        ];

        // Cari role berdasarkan slug
        if (!isset($imports[$slug])) {
            return redirect()->route('dm-import-direct-schedule.index')
                ->with('error', 'Role not found');
        }

        $import = $imports[$slug];
        $titleMain = ucfirst('Form Edit Import Direct Schedule ' . $import['destination']);

        return view('DataMaster.dm-import-direct-schedule', compact('titleMain', 'import'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DmImportDirectScheduleModel $dmImportDirectScheduleModel, $slug)
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

            return redirect()->route('dm-import-direct-schedule.edit', ['slug' => $slug])->with('success', 'Data updated successful');
        } catch (\Exception $e) {
            return redirect()->route('dm-import-direct-schedule.edit', ['slug' => $slug])->with('error', 'Data updated failed ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DmImportDirectScheduleModel $dmImportDirectScheduleModel)
    {
        return redirect()->route('dm-import-direct-schedule.index')->with('success', 'Data Deleted Successful');
    }

    public function getImportDirectSchedule(Request $request)
    {
        $import = [
            [
                'slug' => 'slug-1',
                'destination' => 'Jakarta',
                'voyage' => '2109S',
                'vessel' => 'RIO GRANDE',
                'etd_origin' => '2022-05-17',
                'stf/cls' => '2022-05-15',
                'eta_destination' => '2022-05-19',
            ],
            [
                'slug' => 'slug-2',
                'destination' => 'Tokyo',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2021-02-02',
                'stf/cls' => '2021-02-02',
                'eta_destination' => '2021-02-02',
            ],
            [
                'slug' => 'slug-3',
                'destination' => 'Yokohama',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2021-02-02',
                'stf/cls' => '2021-02-02',
                'eta_destination' => '2021-02-02',
            ],
            [
                'slug' => 'slug-4',
                'destination' => 'Hanoi',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2021-02-02',
                'stf/cls' => '2021-02-02',
                'eta_destination' => '2021-02-02',
            ],
            [
                'slug' => 'slug-5',
                'destination' => 'Bangkok',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2021-02-02',
                'stf/cls' => '2021-02-02',
                'eta_destination' => '2021-02-02',
            ],
            [
                'slug' => 'slug-6',
                'destination' => 'Kuala Lumpur',
                'voyage' => '120S',
                'vessel' => 'ShipOne',
                'etd_origin' => '2021-02-02',
                'stf/cls' => '2021-02-02',
                'eta_destination' => '2021-02-02',
            ],
        ];

        if (!$request->ajax()) {
            abort(403, 'Unauthorized access'); // Kembalikan error 403 jika bukan AJAX
        }

        $imports = Collection::make($import);

        return DataTables::of($imports)
            ->addIndexColumn()
            ->addColumn('actions', function ($item) {
                return '<span class="flex flex-wrap gap-1 text-white md:justify-end">' .
                    '<a
                        title="Edit"
                        class="rounded-sm bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-warnaBiruHover"
                        href="/dm-import-direct-schedule/' . $item['slug'] . '/edit"
                    >' .
                    '<i class="fa-solid fa-pen-to-square mr-1"></i>
                        Edit
                    </a>' .
                    ' <button
                        title="Delete"
                        class="cursor-pointer rounded-sm bg-warnaMerahTombol px-2 py-1 transition-all duration-300 ease-in-out hover:bg-red-300"
                        x-on:click="openDeleteModal(\'/dm-import-direct-schedule/' . $item['slug'] . '\')">' .
                    '<i class="fa-solid fa-trash-can mr-1"></i>Delete </button>'
                    . '</span>';
            })
            ->rawColumns(['actions'])
            ->make(true);

    }

    public function import(Request $request)
    {
        $titleMain = "Form Import Direct Schedule";
        return view('DataMaster.dm-import-direct-schedule', compact('titleMain'));
    }

    public function importStore(Request $request)
    {
        try {
            $validated = $request->validate([
                'file' => 'required|mimes:xlsx,xls,csv|max:2048',
            ]);

            return redirect()->route('dm-import-direct-schedule.import')->with('success', 'Data saved successful');
        } catch (\Exception $e) {
            return redirect()->route('dm-import-direct-schedule.import')->with('error', 'Data saved failed ' . $e->getMessage());
        }

    }
}
