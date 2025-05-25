<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class TfFleetHistoryController extends Controller
{
    private function getDummyData()
    {
        return [
            [
                'driver_name' => 'Bayu Nugroho',
                'license_plate_name' => 'B 9182 TEV',
                'start_time' => '2022-02-04 13:24:56',
                'end_time' => '2022-02-07 13:38:29',
                'ship_from' => 'Pool 1',
                'status_shipment' => 'Ended',
                'volume' => '0',
                'weight' => '0',
                'customer' => 'PT CMP (Cahaya Metal Perkasa)',
                'order_no' => 'DO-00009',
                'fleet_category' => 'wingbox',
                'fleet_type' => 'wingbox',
                'fleet_number' => 'FO-00003',
                'address' => 'Pool 1',
                'app_status' => 'started',
                'arrived_time' => '',
                'departed_time' => '',
                'eta' => '2022-02-03 21:00:00',
                'mileage' => '0',
                'receiver_name' => '',
                'rejection_reason' => '',
                'status_order' => 'Picked',
                'time_app_update' => '',
                'type' => 'P'
            ],
            [
                'driver_name' => 'Sugiman',
                'license_plate_name' => 'B 9708 TCH',
                'start_time' => '2022-02-04 11:48:30',
                'end_time' => '2022-02-04 16:58:13',
                'ship_from' => 'Pool 1',
                'status_shipment' => 'Ended',
                'volume' => '0',
                'weight' => '0',
                'customer' => 'PT CMP (Cahaya Metal Perkasa)',
                'order_no' => 'DO-00009',
                'fleet_category' => 'wingbox',
                'fleet_type' => 'wingbox',
                'fleet_number' => 'FO-00004',
                'address' => 'Pool 1',
                'app_status' => 'started',
                'arrived_time' => '',
                'departed_time' => '',
                'eta' => '2022-02-03 21:00:00',
                'mileage' => '0',
                'receiver_name' => '',
                'rejection_reason' => '',
                'status_order' => 'Picked',
                'time_app_update' => '',
                'type' => 'P'
            ],
            [
                'driver_name' => 'Ridwan Dian Surata',
                'license_plate_name' => 'B 9567 TEI',
                'start_time' => '2022-02-04 13:24:43',
                'end_time' => '2022-02-07 22:21:21',
                'ship_from' => 'Pool 1',
                'status_shipment' => 'Ended',
                'volume' => '0',
                'weight' => '0',
                'customer' => 'PT CMP (Cahaya Metal Perkasa)',
                'order_no' => 'DO-00009',
                'fleet_category' => 'wingbox',
                'fleet_type' => 'wingbox',
                'fleet_number' => 'FO-00005',
                'address' => 'Pool 1',
                'app_status' => 'started',
                'arrived_time' => '',
                'departed_time' => '',
                'eta' => '2022-02-03 21:00:00',
                'mileage' => '0',
                'receiver_name' => '',
                'rejection_reason' => '',
                'status_order' => 'Picked',
                'time_app_update' => '',
                'type' => 'P'
            ],
            [
                'driver_name' => 'Diding Wahyudin',
                'license_plate_name' => 'B 9616 TXT',
                'start_time' => '2022-02-04 16:02:32',
                'end_time' => '2022-02-04 19:20:05',
                'ship_from' => 'Pool 1',
                'status_shipment' => 'Ended',
                'volume' => '0',
                'weight' => '0',
                'customer' => 'PT CMP (Cahaya Metal Perkasa)',
                'order_no' => 'DO-00009',
                'fleet_category' => 'wingbox',
                'fleet_type' => 'wingbox',
                'fleet_number' => 'FO-00006',
                'address' => 'Pool 1',
                'app_status' => 'started',
                'arrived_time' => '',
                'departed_time' => '',
                'eta' => '2022-02-03 21:00:00',
                'mileage' => '0',
                'receiver_name' => '',
                'rejection_reason' => '',
                'status_order' => 'Picked',
                'time_app_update' => '',
                'type' => 'P'
            ],
            [
                'driver_name' => 'Irwan Gunawan',
                'license_plate_name' => 'B 9790 TEI',
                'start_time' => '2022-02-04 22:41:38',
                'end_time' => '2022-02-05 16:41:42',
                'ship_from' => 'Pool 1',
                'status_shipment' => 'Ended',
                'volume' => '0',
                'weight' => '0',
                'customer' => 'PT CMP (Cahaya Metal Perkasa)',
                'order_no' => 'DO-00009',
                'fleet_category' => 'wingbox',
                'fleet_type' => 'wingbox',
                'fleet_number' => 'FO-00007',
                'address' => 'Pool 1',
                'app_status' => 'started',
                'arrived_time' => '',
                'departed_time' => '',
                'eta' => '2022-02-03 21:00:00',
                'mileage' => '0',
                'receiver_name' => '',
                'rejection_reason' => '',
                'status_order' => 'Picked',
                'time_app_update' => '',
                'type' => 'P'
            ],
            [
                'driver_name' => 'Obing',
                'license_plate_name' => 'B 9478 TCD',
                'start_time' => '2022-02-05 09:54:36',
                'end_time' => '2022-02-05 11:24:09',
                'ship_from' => 'Pool 1',
                'status_shipment' => 'Ended',
                'volume' => '0',
                'weight' => '0',
                'customer' => 'PT CMP (Cahaya Metal Perkasa)',
                'order_no' => 'DO-00009',
                'fleet_category' => 'wingbox',
                'fleet_type' => 'wingbox',
                'fleet_number' => 'FO-00008',
                'address' => 'Pool 1',
                'app_status' => 'started',
                'arrived_time' => '',
                'departed_time' => '',
                'eta' => '2022-02-03 21:00:00',
                'mileage' => '0',
                'receiver_name' => '',
                'rejection_reason' => '',
                'status_order' => 'Picked',
                'time_app_update' => '',
                'type' => 'P'
            ],
            [
                'driver_name' => 'Bonin',
                'license_plate_name' => 'B 9695 TEK',
                'start_time' => '2022-02-05 09:43:00',
                'end_time' => '',
                'ship_from' => 'Pool 1',
                'status_shipment' => 'In Progress',
                'volume' => '0',
                'weight' => '0',
                'customer' => 'PT CMP (Cahaya Metal Perkasa)',
                'order_no' => 'DO-00009',
                'fleet_category' => 'wingbox',
                'fleet_type' => 'wingbox',
                'fleet_number' => 'FO-00009',
                'address' => 'Pool 1',
                'app_status' => 'started',
                'arrived_time' => '',
                'departed_time' => '',
                'eta' => '2022-02-03 21:00:00',
                'mileage' => '0',
                'receiver_name' => '',
                'rejection_reason' => '',
                'status_order' => 'Picked',
                'time_app_update' => '',
                'type' => 'P'
            ],
            [
                'driver_name' => 'Bonin',
                'license_plate_name' => 'B 9695 TEK',
                'start_time' => '2025-02-05 09:43:00',
                'end_time' => '',
                'ship_from' => 'Pool 1',
                'status_shipment' => 'In Progress',
                'volume' => '0',
                'weight' => '0',
                'customer' => 'PT CMP (Cahaya Metal Perkasa)',
                'order_no' => 'DO-00009',
                'fleet_category' => 'wingbox',
                'fleet_type' => 'wingbox',
                'fleet_number' => 'FO-00009',
                'address' => 'Pool 1',
                'app_status' => 'started',
                'arrived_time' => '',
                'departed_time' => '',
                'eta' => '2022-02-03 21:00:00',
                'mileage' => '0',
                'receiver_name' => '',
                'rejection_reason' => '',
                'status_order' => 'Picked',
                'time_app_update' => '',
                'type' => 'P'
            ],
            [
                'driver_name' => 'Diding Wahyudin',
                'license_plate_name' => 'B 9616 TXT',
                'start_time' => '2022-02-05 09:54:57',
                'end_time' => '2022-02-05 10:07:26',
                'ship_from' => 'Pool 1',
                'status_shipment' => 'Ended',
                'volume' => '0',
                'weight' => '0',
                'customer' => 'PT CMP (Cahaya Metal Perkasa)',
                'order_no' => 'DO-00009',
                'fleet_category' => 'wingbox',
                'fleet_type' => 'wingbox',
                'fleet_number' => 'FO-00010',
                'address' => 'Pool 1',
                'app_status' => 'started',
                'arrived_time' => '',
                'departed_time' => '',
                'eta' => '2022-02-03 21:00:00',
                'mileage' => '0',
                'receiver_name' => '',
                'rejection_reason' => '',
                'status_order' => 'Picked',
                'time_app_update' => '',
                'type' => 'P'
            ],
            [
                'driver_name' => 'Bonin',
                'license_plate_name' => 'B 9695 TEK',
                'start_time' => '2022-02-05 09:54:54',
                'end_time' => '2022-02-08 10:41:02',
                'ship_from' => 'Pool 1',
                'status_shipment' => 'Canceled',
                'volume' => '0',
                'weight' => '0',
                'customer' => 'PT CMP (Cahaya Metal Perkasa)',
                'order_no' => 'DO-00009',
                'fleet_category' => 'wingbox',
                'fleet_type' => 'wingbox',
                'fleet_number' => 'FO-00011',
                'address' => 'Pool 1',
                'app_status' => 'started',
                'arrived_time' => '',
                'departed_time' => '',
                'eta' => '2022-02-03 21:00:00',
                'mileage' => '0',
                'receiver_name' => '',
                'rejection_reason' => '',
                'status_order' => 'Picked',
                'time_app_update' => '',
                'type' => 'P'
            ],
            [
                'driver_name' => 'Alan',
                'license_plate_name' => 'B 9330 TEI',
                'start_time' => '2022-02-05 10:09:29',
                'end_time' => '2022-02-07 08:08:29',
                'ship_from' => 'Pool 1',
                'status_shipment' => 'Canceled',
                'volume' => '0',
                'weight' => '0',
                'customer' => 'PT CMP (Cahaya Metal Perkasa)',
                'order_no' => 'DO-00009',
                'fleet_category' => 'wingbox',
                'fleet_type' => 'wingbox',
                'fleet_number' => 'FO-00012',
                'address' => 'Pool 1',
                'app_status' => 'started',
                'arrived_time' => '',
                'departed_time' => '',
                'eta' => '2022-02-03 21:00:00',
                'mileage' => '0',
                'receiver_name' => '',
                'rejection_reason' => '',
                'status_order' => 'Picked',
                'time_app_update' => '',
                'type' => 'P'
            ],
        ];
    }

    public function index(Request $request)
    {

        $tfFleetHistories = [];

        $titleMain = ucfirst('Fleet Order');

        // Kirim variabel sortField dan sortOrder ke view
        return view('TrackingFleet.tf-fleet-history', compact('tfFleetHistories', 'titleMain'));
    }

    public function getTfFleetHistory(Request $request)
    {
        if (!$request->ajax()) {
            abort(403, 'Unauthorized access'); // Kembalikan error 403 jika bukan AJAX
        }

        $tfFleetHistories = Collection::make($this->getDummyData());

        // Filter berdasarkan rentang tanggal
        $from = $request->input('from');
        $to = $request->input('to');

        if ($from && $to) {
            $fromDate = Carbon::parse($from)->startOfDay();
            $toDate = Carbon::parse($to)->endOfDay();

            $tfFleetHistories = $tfFleetHistories->filter(function ($item) use ($fromDate, $toDate) {
                $startTime = Carbon::parse($item['start_time']);
                $endTime = $item['end_time'] ? Carbon::parse($item['end_time']) : null;
                $status = $item['status_shipment'];

                if ($status === 'In Progress') {
                    // For in-progress orders, check if start_time is before or equal to toDate
                    return $startTime->lte($toDate);
                } else {
                    // For ended/canceled orders, check if they fall within the date range
                    return $startTime->lte($toDate) && $endTime && $endTime->gte($fromDate);
                }
            });
        }

        return DataTables::of($tfFleetHistories)
            ->addIndexColumn()
            ->addColumn('actions', function ($item) {
                return '<a href="/tf-fleet-history/' . $item['fleet_number'] . '" class="transition-all duration-300 ease-in-out hover:text-stone-500">' . '<i class="fa-solid fa-magnifying-glass"></i>' . '</a>';
            })
            // ->editColumn('end_time', function ($item) {
            //     return $item['end_time'] ? Carbon::parse($item['end_time'])->format('Y-m-d H:i:s') : 'In Progress';
            // })
            // ->editColumn('status_shipment', function ($item) {
            //     return $item['end_time'] ? $item['status_shipment'] : 'In Progress';
            // })

            ->rawColumns(['actions'])
            ->make(true);

    }


    public function show($fleet_number)
    {
        // Ambil data dummy
        $data = $this->getDummyData();

        // Cari data berdasarkan shipment_no
        $fleets = Collection::make($data)->firstWhere('fleet_number', $fleet_number);

        // Jika data tidak ditemukan, kembalikan error 404
        if (!$fleets) {
            abort(404, 'Order not found');
        }

        $titleMain = ucfirst('Detail Fleet');

        // Kirim data ke view
        return view('TrackingFleet.tf-fleet-history', compact('fleets', 'titleMain'));
    }
}
