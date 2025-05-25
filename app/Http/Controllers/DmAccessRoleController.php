<?php

namespace App\Http\Controllers;

use App\Models\DmAccessRoleModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;


class DmAccessRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $titleMain = ucfirst('Data Master Access Role');
        return view('DataMaster.dm-access-role', compact('titleMain'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titleMain = ucfirst('Form Create Access Role');
        return view('DataMaster.dm-access-role', compact('titleMain'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'code' => 'required',
                'title' => 'required',
            ]);

            // Kembalikan notifikasi success
            return redirect()->route('dm-access-role.create')->with('success', 'Data Saved Successful');
        } catch (\Exception $e) {
            // Kembalikan notifikasi error
            return redirect()->route('dm-access-role.create')->with('error', 'Data Saved Failed ' . $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(DmAccessRoleModel $dmAccessRoleModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DmAccessRoleModel $dmAccessRoleModel, $slug)
    {
        // Definisi data dummy secara statis
        $roles = [
            'slug-1' => [
                'slug' => 'slug-1',
                'code' => 'ADM',
                'title' => 'Admin',
                'created_at' => '14/04/2022 15:13'
            ],
            'slug-2' => [
                'slug' => 'slug-2',
                'code' => 'REG',
                'title' => 'Regular',
                'created_at' => '14/04/2022 15:13'
            ],
        ];


        // Cari role berdasarkan slug
        if (!isset($roles[$slug])) {
            return redirect()->route('dm-access-role.index')
                ->with('error', 'Role not found');
        }

        $role = $roles[$slug];
        $titleMain = ucfirst('Form Edit Access Role ' . $role['title']);

        return view('DataMaster.dm-access-role', compact('titleMain', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DmAccessRoleModel $dmAccessRoleModel, $slug)
    {
        try {
            $validated = $request->validate([
                'code' => 'required',
                'title' => 'required',
            ]);

            // Kembalikan notifikasi success
            return redirect()->route('dm-access-role.edit', ['slug' => $slug])->with('success', 'Data Updated Successful');
        } catch (\Exception $e) {
            return redirect()->route('dm-access-role.edit', ['slug' => $slug])->with('error', 'Data Updated Failed ' . $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DmAccessRoleModel $dmAccessRoleModel)
    {

        return redirect()->route('dm-access-role.index')->with('success', 'Data Deleted Successful');
    }

    public function getAccessRole(Request $request)
    {
        $accessRole = [
            [
                'slug' => 'slug-1',
                'code' => 'ADM',
                'title' => 'Admin',
                'created_at' => '14/04/2022 15:13'
            ],
            [
                'slug' => 'slug-2',
                'code' => 'REG',
                'title' => 'Regular',
                'created_at' => '14/04/2022 15:13'
            ],
        ];

        if (!$request->ajax()) {
            abort(403, 'Unauthorized access'); // Kembalikan error 403 jika bukan AJAX
        }

        $accessRoles = Collection::make($accessRole);

        return DataTables::of($accessRoles)
            ->addIndexColumn()
            ->addColumn('actions', function ($item) {
                return '<span class="flex flex-wrap gap-1 text-white md:justify-center">' .
                    '<a
                        title="Set Access"
                        class="rounded-sm bg-warnaAbuTombol px-2 py-1 transition-all duration-300 ease-in-out hover:bg-stone-400"
                        href="/dm-access-role/' . $item['slug'] . '/permissions"
                    > ' .
                    '<i class="fa-solid fa-users-gear mr-1"></i>
                        Set Access
                    </a>' .
                    '<a
                        title="Edit"
                        class="rounded-sm bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-warnaBiruHover"
                        href="/dm-access-role/' . $item['slug'] . '/edit"
                    >' .
                    '<i class="fa-solid fa-pen-to-square mr-1"></i>
                        Edit
                    </a>' .
                    ' <button
                        title="Delete"
                        class="cursor-pointer rounded-sm bg-warnaMerahTombol px-2 py-1 transition-all duration-300 ease-in-out hover:bg-red-300"
                        x-on:click="openDeleteModal(\'/dm-access-role/' . $item['slug'] . '\')">' .
                    '<i class="fa-solid fa-trash-can mr-1"></i>Delete </button>'
                    . '</span>';
            })
            ->rawColumns(['actions'])
            ->make(true);

    }

    public function permissions(DmAccessRoleModel $dmAccessRoleModel, $slug)
    {
        $roles = [
            'slug-1' => [
                'slug' => 'slug-1',
                'code' => 'ADM',
                'title' => 'Admin',
                'created_at' => '14/04/2022 15:13'
            ],
            'slug-2' => [
                'slug' => 'slug-2',
                'code' => 'REG',
                'title' => 'Regular',
                'created_at' => '14/04/2022 15:13'
            ],
        ];

        // Daftar menu dan nama
        $menuMap = [
            'D001' => 'Dashboard',
            'M001' => 'Data Master',
            'M002' => 'Cargo',
            'M003' => 'Location',
            'M004' => 'Shipper',
            'M005' => 'Consignee',
            'M006' => 'Notify Party',
            'M007' => 'Air Port',
            'SC01' => 'Schedule',
            'RQ01' => 'Booking Online',
            'RQ02' => 'FCL - Full Container Load',
            'RQ03' => 'LCL - Less Container Load',
            'RQ04' => 'Non Container Shipment',
            'RQ05' => 'Air Freight Shipment',
            'RQ06' => 'Charter Full Truck',
            'RQ07' => 'Less Truck Load',
            'RQ08' => 'Custom Only',
            'EQ01' => 'SI Final Online',
            'EQ02' => 'List SI',
            'MS01' => 'Manage Shipment',
            'MS02' => 'List Shipment',
            'TX01' => 'Tracking Shipment',
            'ME01' => 'Tracking Fleet',
            'ME02' => 'List Order',
            'ME03' => 'Fleet History',
            'DD01' => 'Draft Document',
            'DD02' => 'Bill of Lading',
            'DD03' => 'Airway Bill',
            'DD04' => 'PEB (Export Declaration)',
            'DD05' => 'PIB (Import Declaration)',
            'IV01' => 'Commercial Invoice',
            'OT01' => 'Open Ticket',
            'TU01' => 'Tutorial',
        ];

        // Inisialisasi permissions dari session
        $permissions = [];
        if (!session()->has("roles_{$slug}_permissions")) {
            foreach ($menuMap as $tcode => $menu) {
                $permissions[$tcode] = [
                    'view' => false,
                    'create' => false,
                    'edit' => false,
                    'delete' => false,
                ];
            }
            session()->put("roles_{$slug}_permissions", $permissions);
            session()->save();
        } else {
            $permissions = session()->get("roles_{$slug}_permissions");
        }


        // Cari role berdasarkan slug
        if (!isset($roles[$slug])) {
            return redirect()->route('dm-access-role.index')
                ->with('error', 'Role not found');
        }

        $role = $roles[$slug];
        $titleMain = ucfirst('Access for Role ' . $role['title']);

        return view('DataMaster.dm-access-role', compact('titleMain', 'role', 'permissions', 'menuMap'));
    }

    // app/Http/Controllers/AccessRoleController.php
    public function updatePermissions(Request $request, $slug)
    {
        // Data dummy roles
        $defaultRoles = [
            'slug-1' => [
                'slug' => 'slug-1',
                'code' => 'ADM',
                'title' => 'Admin',
                'created_at' => '14/04/2022 15:13'
            ],
            'slug-2' => [
                'slug' => 'slug-2',
                'code' => 'REG',
                'title' => 'Regular',
                'created_at' => '14/04/2022 15:13'
            ],
        ];

        if (!isset($defaultRoles[$slug])) {
            return response()->json(['error' => 'Role not found'], 404);
        }

        $validated = $request->validate(['permissions' => 'array']);
        $permissionsInput = $request->input('permissions', []);
        $checked = $request->input('checked', null);

        // Ambil permissions saat ini dari session
        $permissions = session()->get("roles_{$slug}_permissions", []);
        if ($checked !== null && is_array($permissionsInput) && !empty($permissionsInput)) {
            $permissionKey = $permissionsInput[0]; // Ambil satu permission dari array
            [$tcode, $action] = explode('_', $permissionKey); // Pecah menjadi tcode dan action

            if (isset($permissions[$tcode]) && array_key_exists($action, $permissions[$tcode])) {
                $permissions[$tcode][$action] = $checked; // Set langsung berdasarkan checked
                session()->put("roles_{$slug}_permissions", $permissions);
                session()->save(); // Pastikan session disimpan
            }
        }

        return response()->json([
            'success' => true,
        ]);

    }
}
