<?php

namespace App\Http\Controllers;

use App\Models\DmTypeContainerModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;

class DmTypeContainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titleMain = "Data Master Type Container";
        return view('DataMaster.dm-type-container', compact('titleMain'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titleMain = "Form Create Type Container";
        return view('DataMaster.dm-type-container', compact('titleMain'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required',
                'description' => 'required',
            ]);
            // Kembalikan notifikasi success
            return redirect()->route('dm-type-container.create')->with('success', 'Data saved successful');
        } catch (\Exception $e) {
            return redirect()->route('dm-type-container.create')->with('error', 'Data saved failed ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DmTypeContainerModel $dmTypeContainerModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DmTypeContainerModel $dmTypeContainerModel, $slug)
    {
        // Definisi data dummy secara statis
        $types = [
            'slug-1' => [
                'slug' => 'slug-1',
                'title' => 'GC',
                'description' => 'General Purpose',
                'created_at' => '14/04/2022 15:13'
            ],
            'slug-2' => [
                'slug' => 'slug-2',
                'title' => 'HC',
                'description' => 'High Cube',
                'created_at' => '14/04/2022 15:13'
            ]
        ];


        // Cari role berdasarkan slug
        if (!isset($types[$slug])) {
            return redirect()->route('dm-type-container.index')
                ->with('error', 'Role not found');
        }

        $type = $types[$slug];
        $titleMain = ucfirst('Form Edit Type Container ' . $type['title']);

        return view('DataMaster.dm-type-container', compact('titleMain', 'type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DmTypeContainerModel $dmTypeContainerModel, $slug)
    {
        try {
            $validated = $request->validate([
                'title' => 'required',
                'description' => 'required',
            ]);
            return redirect()->route('dm-type-container.edit', ['slug' => $slug])
                ->with('success', 'Data Updated Successful');
        } catch (\Exception $e) {
            return redirect()->route('dm-type-container.edit', ['slug' => $slug])
                ->with('error', 'Data Updated Failed ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DmTypeContainerModel $dmTypeContainerModel)
    {
        return redirect()->route('dm-type-container.index')->with('success', 'Data Deleted Successful');
    }

    public function getTypeContainer(Request $request)
    {
        $type = [
            [
                'slug' => 'slug-1',
                'title' => 'GC',
                'description' => 'General Purpose',
                'created_at' => '14/04/2022 15:13'
            ],
            [
                'slug' => 'slug-2',
                'title' => 'HC',
                'description' => 'High Cube',
                'created_at' => '14/04/2022 15:13'
            ]
        ];

        if (!$request->ajax()) {
            abort(403, 'Unauthorized access'); // Kembalikan error 403 jika bukan AJAX
        }

        $types = Collection::make($type);

        return DataTables::of($types)
            ->addIndexColumn()
            ->addColumn('actions', function ($item) {
                return '<span class="flex flex-wrap gap-1 text-white md:justify-end">' .
                    '<a
                        title="Edit"
                        class="rounded-sm bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-warnaBiruHover"
                        href="/dm-type-container/' . $item['slug'] . '/edit"
                    >' .
                    '<i class="fa-solid fa-pen-to-square mr-1"></i>
                        Edit
                    </a>' .
                    ' <button
                        title="Delete"
                        class="cursor-pointer rounded-sm bg-warnaMerahTombol px-2 py-1 transition-all duration-300 ease-in-out hover:bg-red-300"
                        x-on:click="openDeleteModal(\'/dm-type-container/' . $item['slug'] . '\')">' .
                    '<i class="fa-solid fa-trash-can mr-1"></i>Delete </button> '
                    . '</span>';
            })
            ->rawColumns(['actions'])
            ->make(true);

    }
}
