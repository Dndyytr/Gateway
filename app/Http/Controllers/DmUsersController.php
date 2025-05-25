<?php

namespace App\Http\Controllers;

use App\Models\DmUsersModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;

class DmUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titleMain = ucfirst('Data Master Users');
        return view('DataMaster.dm-users', compact('titleMain'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titleMain = ucfirst('Form Create Users');
        return view('DataMaster.dm-users', compact('titleMain'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi data
            $validatedData = $request->validate([
                'company_name' => 'required',
                'person_in_charge' => 'required',
                'email_address' => 'required|email',
                'npwp' => 'required',
                'photo_of_npwp' => 'nullable|image',
                'company_legality' => 'nullable|image',
                'password' => 'nullable',
                'confirm_password' => 'nullable',
            ]);

            // Kembalikan notifikasi success
            return redirect()->route('dm-users.create')->with('success', 'User has been Registered');
        } catch (\Exception $e) {
            // Kembalikan notifikasi error
            return redirect()->route('dm-users.create')->with('error', 'User failed to be Registered ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DmUsersModel $dmUsersModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DmUsersModel $dmUsersModel, $slug)
    {
        // Definisi data dummy secara statis
        $users = [
            'slug-1' => [
                'slug' => 'slug-1',
                'company_name' => 'PT BMJ',
                'pic' => 'FMS Testing',
                'email' => 'fms-testing@gmail.com',
                'NPWP' => '-',
                'NIB_number' => '-',
                'photo_of_npwp' => 'npwp.jpg',
                'company_legality_nib' => 'legality-nib.jpg',
                'title' => 'Regular'
            ],
            'slug-2' => [
                'slug' => 'slug-2',
                'company_name' => 'Gateway',
                'pic' => 'FMS Admin',
                'email' => 'fms-admin@gmail.com',
                'NPWP' => '02.667.349.1-033.000',
                'NIB_number' => '-',
                'photo_of_npwp' => 'npwp.jpg',
                'company_legality_nib' => 'legality-nib.jpg',
                'title' => 'Admin'
            ],
        ];


        // Cari role berdasarkan slug
        if (!isset($users[$slug])) {
            return redirect()->route('dm-users.index')
                ->with('error', 'Role not found');
        }

        $user = $users[$slug];
        $titleMain = ucfirst('Form Edit Access Role ' . $user['title']);

        return view('DataMaster.dm-users', compact('titleMain', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DmUsersModel $dmUsersModel, $slug)
    {
        try {
            // Validasi data
            $validatedData = $request->validate([
                'company_name' => 'required',
                'person_in_charge' => 'required',
                'email_address' => 'required|email',
                'npwp' => 'required',
                'photo_of_npwp' => 'nullable|image',
                'company_legality' => 'nullable|image',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ]);

            return redirect()->route('dm-users.edit', ['slug' => $slug])
                ->with('success', 'User has been Updated');
        } catch (\Exception $e) {
            return redirect()->route('dm-users.edit', ['slug' => $slug])
                ->with('error', 'User has not been Updated ' . $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DmUsersModel $dmUsersModel)
    {
        return redirect()->route('dm-users.index')->with('success', 'User has been Deleted');
    }

    public function getUsers(Request $request)
    {
        $user = [
            [
                'slug' => 'slug-1',
                'company_name' => 'PT BMJ',
                'pic' => 'FMS Testing',
                'email' => 'fms-testing@gmail.com',
                'NPWP' => '-',
                'NIB_number' => '-',
                'file_of_npwp' => '',
                'photo_of_npwp' => 'npwp.jpg',
                'company_legality_nib' => 'legality-nib.jpg',
                'title' => 'Regular',
                'created_at' => '14/04/2022 15:00'
            ],
            [
                'slug' => 'slug-2',
                'company_name' => 'Gateway',
                'pic' => 'FMS Admin',
                'email' => 'fms-admin@gmail.com',
                'NPWP' => '02.667.349.1-033.000',
                'NIB_number' => '-',
                'photo_of_npwp' => 'npwp.jpg',
                'file_of_npwp' => 'k',
                'company_legality_nib' => '',
                'title' => 'Admin',
                'created_at' => '14/04/2022 15:13'
            ],


        ];

        if (!$request->ajax()) {
            abort(403, 'Unauthorized access'); // Kembalikan error 403 jika bukan AJAX
        }

        $users = Collection::make($user);

        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('actions', function ($item) {
                return '<span class="flex flex-wrap gap-1 text-white md:justify-end">' .
                    '<a
                        title="Edit"
                        class="rounded-sm bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-warnaBiruHover"
                        href="/dm-users/' . $item['slug'] . '/edit"
                    >' .
                    '<i class="fa-solid fa-pen-to-square mr-1"></i>
                        Edit
                    </a>' .
                    ' <button
                        title="Delete"
                        class="cursor-pointer rounded-sm bg-warnaMerahTombol px-2 py-1 transition-all duration-300 ease-in-out hover:bg-red-300"
                        x-on:click="openDeleteModal(\'/dm-users/' . $item['slug'] . '\')">' .
                    '<i class="fa-solid fa-trash-can mr-1"></i>Delete </button>'
                    . '</span>';
            })
            ->addColumn('company_legality_nib', function ($item) {
                if ($item['company_legality_nib']) {
                    return '<a class="bg-warnaBiruTua text-white rounded-sm transition-all duration-300 ease-in-out hover:bg-warnaBiruHover px-2 py-1" title="View Legality NIB" href="/dm-users/' . $item['company_legality_nib'] . '"><i class="fa-solid fa-folder-open"></i> View</a>';
                }

                return '';
            })
            ->addColumn('file_of_npwp', function ($item) {
                if ($item['file_of_npwp']) {
                    return '<a class="bg-warnaBiruTua text-white rounded-sm transition-all duration-300 ease-in-out hover:bg-warnaBiruHover px-2 py-1" title="View NPWP" href="/dm-users/' . $item['file_of_npwp'] . '"><i class="fa-solid fa-folder-open"></i> View</a>';
                }

                return '';
            })
            ->rawColumns(['actions', 'company_legality_nib', 'file_of_npwp'])
            ->make(true);

    }
}
