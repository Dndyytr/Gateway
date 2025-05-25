<?php

namespace App\Http\Controllers;

use App\Models\DmTruckModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;

class DmTruckController extends Controller
{
    /**
     * truck_type a listing of the resource.
     */
    public function index()
    {
        $titleMain = ucfirst('Data Master Truck');
        return view('DataMaster.dm-truck', compact('titleMain'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titleMain = ucfirst('Form Create Truck');
        return view('DataMaster.dm-truck', compact('titleMain'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'truck_name' => 'required',
                'truck_type' => 'required',
            ]);
            // Kembalikan notifikasi success
            return redirect()->route('dm-truck.create')->with('success', 'Data saved successful');
        } catch (\Exception $e) {
            return redirect()->route('dm-truck.create')->with('error', 'Data saved failed ' . $e->getMessage());
        }
    }

    /**
     * truck_type the specified resource.
     */
    public function show(DmTruckModel $dmTruckModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DmTruckModel $dmTruckModel, $slug)
    {
        $trucks = [
            'slug-1' => [
                'slug' => 'slug-1',
                'truck_name' => 'Truck 1',
                'truck_type' => 'Truck Type 1',
                'created_at' => '14/04/2022'
            ],
            'slug-2' => [
                'slug' => 'slug-2',
                'truck_name' => 'Truck 2',
                'truck_type' => 'Truck Type 2',
                'created_at' => '14/04/2022'
            ],

        ];
        // Cari role berdasarkan slug
        if (!isset($trucks[$slug])) {
            return redirect()->route('dm-truck.index')
                ->with('error', 'Role not found');
        }

        $truck = $trucks[$slug];
        $titleMain = ucfirst('Form Edit Truck ' . $truck['truck_name']);

        return view('DataMaster.dm-truck', compact('titleMain', 'truck'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DmTruckModel $dmTruckModel, $slug)
    {
        try {
            $validated = $request->validate([
                'truck_name' => 'required',
                'truck_type' => 'required',
            ]);
            return redirect()->route('dm-truck.edit', ['slug' => $slug])
                ->with('success', 'Data Updated Successful');
        } catch (\Exception $e) {
            return redirect()->route('dm-truck.edit', ['slug' => $slug])
                ->with('error', 'Data Updated Failed ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DmTruckModel $dmTruckModel)
    {
        return redirect()->route('dm-truck.index')->with('success', 'Data Deleted Successful');
    }

    public function getTruck(Request $request)
    {
        $truck = [
            [
                'slug' => 'slug-1',
                'truck_name' => 'Truck 1',
                'truck_type' => 'Truck Type 1',
                'created_at' => '14/04/2022'
            ],
            [
                'slug' => 'slug-2',
                'truck_name' => 'Truck 2',
                'truck_type' => 'Truck Type 2',
                'created_at' => '14/04/2022'
            ],

        ];

        if (!$request->ajax()) {
            abort(403, 'Unauthorized access'); // Kembalikan error 403 jika bukan AJAX
        }

        $trucks = Collection::make($truck);

        return DataTables::of($trucks)
            ->addIndexColumn()
            ->addColumn('actions', function ($item) {
                return '<span class="flex flex-wrap gap-1 text-white md:justify-end">' .
                    '<a
                        title="Edit"
                        class="rounded-sm bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-warnaBiruHover"
                        href="/dm-truck/' . $item['slug'] . '/edit"
                    >' .
                    '<i class="fa-solid fa-pen-to-square mr-1"></i>
                        Edit
                    </a>' .
                    ' <button
                        title="Delete"
                        class="cursor-pointer rounded-sm bg-warnaMerahTombol px-2 py-1 transition-all duration-300 ease-in-out hover:bg-red-300"
                        x-on:click="openDeleteModal(\'/dm-truck/' . $item['slug'] . '\')">' .
                    '<i class="fa-solid fa-trash-can mr-1"></i>Delete </button>'
                    . '</span>';
            })
            ->rawColumns(['actions'])
            ->make(true);

    }
}
