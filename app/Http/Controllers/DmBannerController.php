<?php

namespace App\Http\Controllers;

use App\Models\DmBannerModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;

class DmBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titleMain = ucfirst('Data Master Banner');
        return view('DataMaster.dm-banner', compact('titleMain'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titleMain = ucfirst('Form Create Banner');
        return view('DataMaster.dm-banner', compact('titleMain'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'banner' => 'required|image|mimes:jpeg,jpg,png|max:1024',
                'title' => 'required',
            ]);

            // Kembalikan notifikasi success
            return redirect()->route('dm-banner.create')->with('success', 'Data Saved Successful');
        } catch (\Exception $e) {
            // Kembalikan notifikasi error
            return redirect()->route('dm-banner.create')->with('error', 'Data Saved Failed ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DmBannerModel $dmBannerModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DmBannerModel $dmBannerModel, $slug)
    {
        $banners = [
            'slug-1' => [
                'slug' => 'slug-1',
                'title' => 'Banner 1',
                'image' => 'https://images.pexels.com/photos/1181671/pexels-photo-1181671.jpeg',
                'created_at' => '14/04/2022'
            ],
            'slug-2' => [
                'slug' => 'slug-2',
                'title' => 'Banner 2',
                'image' => 'https://images.pexels.com/photos/1181671/pexels-photo-1181671.jpeg',
                'created_at' => '14/04/2022'
            ],
        ];

        if (!isset($banners[$slug])) {
            return redirect()->route('dm-banner.index')
                ->with('error', 'Role not found');
        }

        $banner = $banners[$slug];
        $titleMain = ucfirst('Form Edit Banner ' . $banner['title']);

        return view('DataMaster.dm-banner', compact('titleMain', 'banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DmBannerModel $dmBannerModel, $slug)
    {
        try {
            $validated = $request->validate([

                'title' => 'required',
            ]);

            // Kembalikan notifikasi success
            return redirect()->route('dm-banner.edit', ['slug' => $slug])->with('success', 'Data Updated Successful');
        } catch (\Exception $e) {
            // Kembalikan notifikasi error
            return redirect()->route('dm-banner.edit', ['slug' => $slug])->with('error', 'Data Updated Failed ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DmBannerModel $dmBannerModel)
    {
        return redirect()->route('dm-banner.index')->with('success', 'Data Deleted Successful');
    }

    public function getBanner(Request $request)
    {
        $banner = [
            [
                'slug' => 'slug-1',
                'title' => 'Banner 1',
                'image' => 'https://images.pexels.com/photos/1181671/pexels-photo-1181671.jpeg',
                'created_at' => '14/04/2022'
            ],
            [
                'slug' => 'slug-2',
                'title' => 'Banner 2',
                'image' => 'https://images.pexels.com/photos/1181671/pexels-photo-1181671.jpeg',
                'created_at' => '14/04/2022'
            ],
        ];

        if (!$request->ajax()) {
            abort(403, 'Unauthorized access'); // Kembalikan error 403 jika bukan AJAX
        }

        $banners = Collection::make($banner);

        return DataTables::of($banners)
            ->addIndexColumn()
            ->addColumn('actions', function ($item) {
                return '<span class="flex flex-wrap gap-1 text-white md:justify-end">' .
                    '<a
                        title="Edit"
                        class="rounded-sm bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-warnaBiruHover"
                        href="/dm-banner/' . $item['slug'] . '/edit"
                    >' .
                    '<i class="fa-solid fa-pen-to-square mr-1"></i>
                        Edit
                    </a>' .
                    ' <button
                        title="Delete"
                        class="cursor-pointer rounded-sm bg-warnaMerahTombol px-2 py-1 transition-all duration-300 ease-in-out hover:bg-red-300"
                        x-on:click="openDeleteModal(\'/dm-banner/' . $item['slug'] . '\')">' .
                    '<i class="fa-solid fa-trash-can mr-1"></i>Delete </button>'
                    . '</span>';
            })
            ->addColumn('image', function ($item) {
                return '<img src="' . $item['image'] . '" alt="Banner Image" class="w-full mt-1 md:mt-0 h-full max-h-15 object-cover object-center">';
            })
            ->rawColumns(['actions', 'image'])
            ->make(true);
    }
}
