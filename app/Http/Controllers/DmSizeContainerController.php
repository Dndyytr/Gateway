<?php

namespace App\Http\Controllers;

use App\Models\DmSizeContainerModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;

class DmSizeContainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titleMain = ucfirst('Data Master Size Container');
        return view('DataMaster.dm-size-container', compact('titleMain'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titleMain = ucfirst('Form Create Size Container');
        return view('DataMaster.dm-size-container', compact('titleMain'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'value' => 'required',
                'display' => 'required',
            ]);
            // Kembalikan notifikasi success
            return redirect()->route('dm-size-container.create')->with('success', 'Data saved successful');
        } catch (\Exception $e) {
            return redirect()->route('dm-size-container.create')->with('error', 'Data saved failed ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DmSizeContainerModel $dmSizeContainerModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DmSizeContainerModel $dmSizeContainerModel, $slug)
    {
        // Definisi data dummy secara statis
        $sizes = [
            'slug-1' => [
                'slug' => 'slug-1',
                'value' => '20',
                'display' => '20 Feet',
                'created_at' => '14/04/2022 15:13'
            ],
            'slug-2' => [
                'slug' => 'slug-2',
                'value' => '40',
                'display' => '40 Feet',
                'created_at' => '14/04/2022 15:13'
            ],
            'slug-3' => [
                'slug' => 'slug-2',
                'value' => '45',
                'display' => '45 Feet',
                'created_at' => '14/04/2022 15:13'
            ],
        ];


        // Cari role berdasarkan slug
        if (!isset($sizes[$slug])) {
            return redirect()->route('dm-size-container.index')
                ->with('error', 'Role not found');
        }

        $size = $sizes[$slug];
        $titleMain = ucfirst('Form Edit Size Container ' . $size['display']);

        return view('DataMaster.dm-size-container', compact('titleMain', 'size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DmSizeContainerModel $dmSizeContainerModel, $slug)
    {
        try {
            $validated = $request->validate([
                'value' => 'required',
                'display' => 'required',
            ]);
            return redirect()->route('dm-size-container.edit', ['slug' => $slug])
                ->with('success', 'Data Updated Successful');
        } catch (\Exception $e) {
            return redirect()->route('dm-size-container.edit', ['slug' => $slug])
                ->with('error', 'Data Updated Failed ' . $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DmSizeContainerModel $dmSizeContainerModel)
    {
        return redirect()->route('dm-size-container.index')->with('success', 'Data Deleted Successful');
    }

    public function getSizeContainer(Request $request)
    {
        $size = [
            [
                'slug' => 'slug-1',
                'value' => '20',
                'display' => '20 Feet',
                'created_at' => '14/04/2022 15:13'
            ],
            [
                'slug' => 'slug-2',
                'value' => '40',
                'display' => '40 Feet',
                'created_at' => '14/04/2022 15:13'
            ],
            [
                'slug' => 'slug-2',
                'value' => '45',
                'display' => '45 Feet',
                'created_at' => '14/04/2022 15:13'
            ],
        ];

        if (!$request->ajax()) {
            abort(403, 'Unauthorized access'); // Kembalikan error 403 jika bukan AJAX
        }

        $sizes = Collection::make($size);

        return DataTables::of($sizes)
            ->addIndexColumn()
            ->addColumn('actions', function ($item) {
                return '<span class="flex flex-wrap gap-1 text-white md:justify-end">' .
                    '<a
                        title="Edit"
                        class="rounded-sm bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-warnaBiruHover"
                        href="/dm-size-container/' . $item['slug'] . '/edit"
                    >' .
                    '<i class="fa-solid fa-pen-to-square mr-1"></i>
                        Edit
                    </a>' .
                    ' <button
                        title="Delete"
                        class="cursor-pointer rounded-sm bg-warnaMerahTombol px-2 py-1 transition-all duration-300 ease-in-out hover:bg-red-300"
                        x-on:click="openDeleteModal(\'/dm-size-container/' . $item['slug'] . '\')">' .
                    '<i class="fa-solid fa-trash-can mr-1"></i>Delete </button>'
                    . '</span>';
            })
            ->rawColumns(['actions'])
            ->make(true);

    }
}
