<?php

namespace App\Http\Controllers;

use App\Models\ListTrackingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;


class ListTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titleMain = "List Tracking Shipment";
        return view('ListTracking.list-tracking', compact('titleMain'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ListTrackingModel $listTrackingModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ListTrackingModel $listTrackingModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ListTrackingModel $listTrackingModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ListTrackingModel $listTrackingModel)
    {
        //
    }

    public function getListTracking(Request $request)
    {
        $listTracking = [];

        if (!$request->ajax()) {
            abort(403, 'Unauthorized access'); // Kembalikan error 403 jika bukan AJAX
        }

        $listTrackings = Collection::make($listTracking);

        return DataTables::of($listTrackings)
            ->addIndexColumn()
            ->addColumn('actions', function ($item) {
                return '<span class="flex flex-wrap gap-1 text-white md:justify-center">' .
                    '<a
                        title="Edit"
                        class="rounded-sm bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-warnaBiruHover"
                        href="/list-tracking/' . $item['slug'] . '/edit"
                    >' .
                    '<i class="fa-solid fa-pen-to-square mr-1"></i>
                        Edit
                    </a>' .
                    ' <button
                        title="Delete"
                        class="cursor-pointer rounded-sm bg-warnaMerahTombol px-2 py-1 transition-all duration-300 ease-in-out hover:bg-red-300"
                        x-on:click="openDeleteModal(\'/list-tracking/' . $item['slug'] . '\')">' .
                    '<i class="fa-solid fa-trash-can mr-1"></i>Delete </button>'
                    . '</span>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
