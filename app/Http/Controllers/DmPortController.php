<?php

namespace App\Http\Controllers;

use App\Models\DmPortModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;

class DmPortController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titleMain = "Data Master Port";
        return view('DataMaster.dm-port', compact('titleMain'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titleMain = "Form Create Port";
        return view('DataMaster.dm-port', compact('titleMain'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'port_name' => 'required',
                'type' => 'required',
                'country' => 'nullable',
                'country_code' => 'nullable',
                'city' => 'nullable',
                'address' => 'required',
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
            ]);

            return redirect()->route('dm-port.create')->with('success', 'Data saved successful');
        } catch (\Exception $e) {
            return redirect()->route('dm-port.create')->with('error', 'Data saved failed ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DmPortModel $dmPortModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DmPortModel $dmPortModel, $slug)
    {
        // Definisi data dummy secara statis
        $ports = [
            'slug-1' => [
                'slug' => 'slug-1',
                'port_name' => 'Port Klang',
                'type' => 'air_freight',
                'country' => 'Malaysia',
                'country_code' => 'MY',
                'city' => 'Kuala Lumpur',
                'address' => 'Port Klang',
                'latitude' => '3.1502718579792535',
                'longitude' => '101.69550911411646',
            ],
            'slug-2' => [
                'slug' => 'slug-2',
                'port_name' => 'Port of Tanjung Priok',
                'type' => 'sea_freight',
                'country' => 'Indonesia',
                'country_code' => 'ID',
                'city' => 'Jakarta',
                'address' => 'Pelabuhan tanjung perak',
                'latitude' => '-6.175482834876083',
                'longitude' => '106.82716333712317',
            ]
        ];


        // Cari role berdasarkan slug
        if (!isset($ports[$slug])) {
            return redirect()->route('dm-port.index')
                ->with('error', 'Role not found');
        }

        $port = $ports[$slug];
        $titleMain = ucfirst('Form Edit Port ' . $port['port_name']);

        return view('DataMaster.dm-port', compact('titleMain', 'port'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DmPortModel $dmPortModel, $slug)
    {
        try {
            $validated = $request->validate([
                'port_name' => 'required',
                'type' => 'required',
                'country' => 'nullable',
                'country_code' => 'nullable',
                'city' => 'nullable',
                'address' => 'required',
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
            ]);

            return redirect()->route('dm-port.edit', ['slug' => $slug])->with('success', 'Data updated successful');
        } catch (\Exception $e) {
            return redirect()->route('dm-port.edit', ['slug' => $slug])->with('error', 'Data updated failed ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DmPortModel $dmPortModel)
    {
        return redirect()->route('dm-port.index')->with('success', 'Data Deleted Successful');
    }

    public function getPort(Request $request)
    {
        $port = [
            [
                'slug' => 'slug-1',
                'port_name' => 'Port Klang',
                'type' => 'Terminal',
                'country' => 'Malaysia',
                'country-code' => 'MY',
                'city' => 'Kuala Lumpur',
                'address' => 'Port Klang',
                'latitude' => '3.1502718579792535',
                'longitude' => '101.69550911411646',
            ],
            [
                'slug' => 'slug-2',
                'port_name' => 'Port of Tanjung Priok',
                'type' => 'SEA FREIGHT',
                'country' => 'Indonesia',
                'country_code' => 'ID',
                'city' => 'Jakarta',
                'address' => 'Pelabuhan tanjung perak',
                'latitude' => '-6.175482834876083',
                'longitude' => '106.82716333712317',
            ]
        ];

        if (!$request->ajax()) {
            abort(403, 'Unauthorized access'); // Kembalikan error 403 jika bukan AJAX
        }

        $ports = Collection::make($port);

        return DataTables::of($ports)
            ->addIndexColumn()
            ->addColumn('actions', function ($item) {
                return '<span class="flex flex-wrap gap-1 text-white md:justify-end">' .
                    '<a
                        title="Edit"
                        class="rounded-sm bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-warnaBiruHover"
                        href="/dm-port/' . $item['slug'] . '/edit"
                    >' .
                    '<i class="fa-solid fa-pen-to-square mr-1"></i>
                        Edit
                    </a>' .
                    ' <button
                        title="Delete"
                        class="cursor-pointer rounded-sm bg-warnaMerahTombol px-2 py-1 transition-all duration-300 ease-in-out hover:bg-red-300"
                        x-on:click="openDeleteModal(\'/dm-port/' . $item['slug'] . '\')">' .
                    '<i class="fa-solid fa-trash-can mr-1"></i>Delete </button>'
                    . '</span>';
            })
            ->rawColumns(['actions'])
            ->make(true);

    }
}
