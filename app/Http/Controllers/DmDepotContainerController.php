<?php

namespace App\Http\Controllers;

use App\Models\DmDepotContainerModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;

class DmDepotContainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titleMain = "Data Master Depot Container";
        return view('DataMaster.dm-depot-container', compact('titleMain'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titleMain = "Form Create Depot Container";
        return view('DataMaster.dm-depot-container', compact('titleMain'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'depot_name' => 'required',
                'city' => 'required',
                'address' => 'required',
            ]);
            // Kembalikan notifikasi success
            return redirect()->route('dm-depot-container.create')->with('success', 'Data saved successful');
        } catch (\Exception $e) {
            return redirect()->route('dm-depot-container.create')->with('error', 'Data saved failed ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DmDepotContainerModel $dmDepotContainerModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DmDepotContainerModel $dmDepotContainerModel, $slug)
    {
        // Definisi data dummy secara statis
        $depots = [
            'slug-1' => [
                'slug' => 'slug-1',
                'depot_name' => 'DEPO SPIL MARUNDA',
                'city' => 'Jakarta',
                'address' => 'jln KBN Marunda'
            ],
            'slug-2' => [
                'slug' => 'slug-2',
                'depot_name' => 'DEPO UCLA MARUNDA',
                'city' => 'Jakarta',
                'address' => 'jln KBN Marunda'
            ]
        ];


        // Cari role berdasarkan slug
        if (!isset($depots[$slug])) {
            return redirect()->route('dm-depot-container.index')
                ->with('error', 'Role not found');
        }

        $depot = $depots[$slug];
        $titleMain = ucfirst('Form Edit Depot Container ' . $depot['depot_name']);

        return view('DataMaster.dm-depot-container', compact('titleMain', 'depot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DmDepotContainerModel $dmDepotContainerModel, $slug)
    {
        try {
            $validated = $request->validate([
                'depot_name' => 'required',
                'city' => 'required',
                'address' => 'required',
            ]);
            // Kembalikan notifikasi success
            return redirect()->route('dm-depot-container.edit', ['slug' => $slug])->with('success', 'Data updated successful');
        } catch (\Exception $e) {
            return redirect()->route('dm-depot-container.edit', ['slug' => $slug])->with('error', 'Data updated failed ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DmDepotContainerModel $dmDepotContainerModel)
    {
        return redirect()->route('dm-depot-container.index')->with('success', 'Data Deleted Successful');
    }

    public function getDepotContainer(Request $request)
    {
        $depot = [
            [
                'slug' => 'slug-1',
                'depot_name' => 'DEPO SPIL MARUNDA',
                'city' => 'Jakarta',
                'address' => 'jln KBN Marunda'
            ],
            [
                'slug' => 'slug-2',
                'depot_name' => 'DEPO UCLA MARUNDA',
                'city' => 'Jakarta',
                'address' => 'jln KBN Marunda'
            ]
        ];

        if (!$request->ajax()) {
            abort(403, 'Unauthorized access'); // Kembalikan error 403 jika bukan AJAX
        }

        $depots = Collection::make($depot);

        return DataTables::of($depots)
            ->addIndexColumn()
            ->addColumn('actions', function ($item) {
                return '<span class="flex flex-wrap gap-1 text-white md:justify-end">' .
                    '<a
                        title="Edit"
                        class="rounded-sm bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-warnaBiruHover"
                        href="/dm-depot-container/' . $item['slug'] . '/edit"
                    >' .
                    '<i class="fa-solid fa-pen-to-square mr-1"></i>
                        Edit
                    </a>' .
                    ' <button
                        title="Delete"
                        class="cursor-pointer rounded-sm bg-warnaMerahTombol px-2 py-1 transition-all duration-300 ease-in-out hover:bg-red-300"
                        x-on:click="openDeleteModal(\'/dm-depot-container/' . $item['slug'] . '\')">' .
                    '<i class="fa-solid fa-trash-can mr-1"></i>Delete </button>'
                    . '</span>';
            })
            ->rawColumns(['actions'])
            ->make(true);

    }
}
