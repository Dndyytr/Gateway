<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class TfListOrderController extends Controller
{
    private function getDummyData()
    {
        return [
            [

                'do_number' => 'DO-00166',
                'shipment_no' => 'QN-13052022-D003',
                'departure_date' => '2022-05-14',
                'customer_name' => 'PT BMJ',
                'origin' => 'Pool Marunda',
                'destination' => 'Pabrik BMJ',
                'fleet_category' => 'CDD',
                'fleet_type' => 'CDD',
                'plate_no' => '-',
                'driver' => '-',
                'status' => 'Confirmed',

                'marketing_name' => 'Administrator',
                'temperature_max' => '-',
                'temperature_min' => '-',
                'end_time' => '-',
                'start_time' => '-',
                'note' => '-',
                'name' => 'Harddisk',
                'qty' => '2',
                'volume' => '12',
                'weight' => '100'

            ],
            [

                'do_number' => 'DO-00167',
                'shipment_no' => 'QN-14052022-D004',
                'departure_date' => '2022-05-15',
                'customer_name' => 'PT ABC',
                'origin' => 'Pool Jakarta',
                'destination' => 'Pabrik ABC',
                'fleet_category' => 'Fuso',
                'fleet_type' => 'Fuso',
                'plate_no' => 'B 5678 ABC',
                'driver' => 'Jane Smith',
                'status' => 'Pending',

                'marketing_name' => 'Administrator',
                'temperature_max' => '',
                'temperature_min' => '',
                'end_time' => '',
                'start_time' => '',
                'note' => '',
                'name' => 'Harddisk',
                'qty' => '2',
                'volume' => '12',
                'weight' => '100'
            ],
            [

                'do_number' => 'DO-00168',
                'shipment_no' => 'QN-15052022-D005',
                'departure_date' => '2022-03-16',
                'customer_name' => 'PT XYZ',
                'origin' => 'Pool Surabaya',
                'destination' => 'Pabrik XYZ',
                'fleet_category' => 'Trailer',
                'fleet_type' => 'Trailer',
                'plate_no' => 'B 9012 DEF',
                'driver' => 'Mike Johnson',
                'status' => 'Delivered',

                'marketing_name' => 'Administrator',
                'temperature_max' => '',
                'temperature_min' => '',
                'end_time' => '',
                'start_time' => '',
                'note' => '',
                'name' => 'Harddisk',
                'qty' => '2',
                'volume' => '12',
                'weight' => '100'
            ],
            [

                'do_number' => 'DO-00168',
                'shipment_no' => 'QN-15052022-D005',
                'departure_date' => '2022-08-13',
                'customer_name' => 'PT XYZ',
                'origin' => 'Pool Surabaya',
                'destination' => 'Pabrik XYZ',
                'fleet_category' => 'Trailer',
                'fleet_type' => 'Trailer',
                'plate_no' => 'B 9012 DEF',
                'driver' => 'Mike Johnson',
                'status' => 'Delivered',

                'marketing_name' => 'Administrator',
                'temperature_max' => '',
                'temperature_min' => '',
                'end_time' => '',
                'start_time' => '',
                'note' => '',
                'name' => 'Harddisk',
                'qty' => '2',
                'volume' => '12',
                'weight' => '100'
            ],
            [

                'do_number' => 'DO-00168',
                'shipment_no' => 'QN-15052022-D005',
                'departure_date' => '2022-10-19',
                'customer_name' => 'PT XYZ',
                'origin' => 'qqqrabaya',
                'destination' => 'Pabrik XYZ',
                'fleet_category' => 'Trailer',
                'fleet_type' => 'Trailer',
                'plate_no' => 'B 9012 DEF',
                'driver' => 'Mike Johnson',
                'status' => 'Delivered',

                'marketing_name' => 'Administrator',
                'temperature_max' => '',
                'temperature_min' => '',
                'end_time' => '',
                'start_time' => '',
                'note' => '',
                'name' => 'Harddisk',
                'qty' => '2',
                'volume' => '12',
                'weight' => '100'
            ],
            [

                'do_number' => 'DO-00168',
                'shipment_no' => 'QN-15052022-D005',
                'departure_date' => '2022-11-26',
                'customer_name' => 'zzzZ',
                'origin' => 'Pool Surabaya',
                'destination' => 'Pabrik XYZ',
                'fleet_category' => 'Trailer',
                'fleet_type' => 'Trailer',
                'plate_no' => 'B dddddF',
                'driver' => 'Mike Johnson',
                'status' => 'Delivered',
                'marketing_name' => 'Administrator',
                'temperature_max' => '',
                'temperature_min' => '',
                'end_time' => '',
                'start_time' => '',
                'note' => '',
                'name' => 'Harddisk',
                'qty' => '2',
                'volume' => '12',
                'weight' => '100'
            ],
            [

                'do_number' => 'DO-00168',
                'shipment_no' => 'QN-15052022-D005',
                'departure_date' => '2022-01-10',
                'customer_name' => 'PT oouhb',
                'origin' => 'wwl ttv',
                'destination' => 'Pabrik XYZ',
                'fleet_category' => 'Trailer',
                'fleet_type' => 'Trailer',
                'plate_no' => 'B 9dd',
                'driver' => 'Mike Johnson',
                'status' => 'Delivered',

                'marketing_name' => 'Administrator',
                'temperature_max' => '',
                'temperature_min' => '',
                'end_time' => '',
                'start_time' => '',
                'note' => '',
                'name' => 'Harddisk',
                'qty' => '2',
                'volume' => '12',
                'weight' => '100'
            ],
            [

                'do_number' => 'DO-00168',
                'shipment_no' => 'QN-15052022-D005',
                'departure_date' => '2022-01-10',
                'customer_name' => 'PT oouhb',
                'origin' => 'wwl ttv',
                'destination' => 'Pabrik XYZ',
                'fleet_category' => 'Trailer',
                'fleet_type' => 'Trailer',
                'plate_no' => 'B 9dd',
                'driver' => 'Mike Johnson',
                'status' => 'Delivered',

                'marketing_name' => 'Administrator',
                'temperature_max' => '',
                'temperature_min' => '',
                'end_time' => '',
                'start_time' => '',
                'note' => '',
                'name' => 'Harddisk',
                'qty' => '2',
                'volume' => '12',
                'weight' => '100'
            ],
            [

                'do_number' => 'DO-00168',
                'shipment_no' => 'QN-15052022-D005',
                'departure_date' => '2022-01-10',
                'customer_name' => 'PT oouhb',
                'origin' => 'wwl ttv',
                'destination' => 'Pabrik XYZ',
                'fleet_category' => 'Trailer',
                'fleet_type' => 'Trailer',
                'plate_no' => 'B 9dd',
                'driver' => 'Mike Johnson',
                'status' => 'Delivered',

                'marketing_name' => 'Administrator',
                'temperature_max' => '',
                'temperature_min' => '',
                'end_time' => '',
                'start_time' => '',
                'note' => '',
                'name' => 'Harddisk',
                'qty' => '2',
                'volume' => '12',
                'weight' => '100'
            ],
            [

                'do_number' => 'DO-00168',
                'shipment_no' => 'QN-15052022-D005',
                'departure_date' => '2022-01-10',
                'customer_name' => 'PT oouhb',
                'origin' => 'wwl ttv',
                'destination' => 'Pabrik XYZ',
                'fleet_category' => 'Trailer',
                'fleet_type' => 'Trailer',
                'plate_no' => 'B 9dd',
                'driver' => 'Mike Johnson',
                'status' => 'Delivered',

                'marketing_name' => 'Administrator',
                'temperature_max' => '',
                'temperature_min' => '',
                'end_time' => '',
                'start_time' => '',
                'note' => '',
                'name' => 'Harddisk',
                'qty' => '2',
                'volume' => '12',
                'weight' => '100'
            ],
            [

                'do_number' => 'DO-00168',
                'shipment_no' => 'QN-15052022-D005',
                'departure_date' => '2022-01-10',
                'customer_name' => 'PT oouhb',
                'origin' => 'wwl ttv',
                'destination' => 'Pabrik XYZ',
                'fleet_category' => 'Trailer',
                'fleet_type' => 'Trailer',
                'plate_no' => 'B 9dd',
                'driver' => 'Mike Johnson',
                'status' => 'Delivered',

                'marketing_name' => 'Administrator',
                'temperature_max' => '',
                'temperature_min' => '',
                'end_time' => '',
                'start_time' => '',
                'note' => '',
                'name' => 'Harddisk',
                'qty' => '2',
                'volume' => '12',
                'weight' => '100'
            ],
            [

                'do_number' => 'DO-00168',
                'shipment_no' => 'QN-15052022-D005',
                'departure_date' => '2022-01-10',
                'customer_name' => 'PT oouhb',
                'origin' => 'wwl ttv',
                'destination' => 'Pabrik XYZ',
                'fleet_category' => 'Trailer',
                'fleet_type' => 'Trailer',
                'plate_no' => 'B 9dd',
                'driver' => 'Mike Johnson',
                'status' => 'Delivered',

                'marketing_name' => 'Administrator',
                'temperature_max' => '',
                'temperature_min' => '',
                'end_time' => '',
                'start_time' => '',
                'note' => '',
                'name' => 'Harddisk',
                'qty' => '2',
                'volume' => '12',
                'weight' => '100'
            ],
            [

                'do_number' => 'DO-00168',
                'shipment_no' => 'QN-15052022-D005',
                'departure_date' => '2022-01-10',
                'customer_name' => 'PT oouhb',
                'origin' => 'wwl ttv',
                'destination' => 'Pabrik XYZ',
                'fleet_category' => 'Trailer',
                'fleet_type' => 'Trailer',
                'plate_no' => 'B 9dd',
                'driver' => 'Mike Johnson',
                'status' => 'Delivered',

                'marketing_name' => 'Administrator',
                'temperature_max' => '',
                'temperature_min' => '',
                'end_time' => '',
                'start_time' => '',
                'note' => '',
                'name' => 'Harddisk',
                'qty' => '2',
                'volume' => '12',
                'weight' => '100'
            ],
            [

                'do_number' => 'DO-00168',
                'shipment_no' => 'QN-15052022-D005',
                'departure_date' => '2022-01-10',
                'customer_name' => 'PT oouhb',
                'origin' => 'wwl ttv',
                'destination' => 'Pabrik XYZ',
                'fleet_category' => 'Trailer',
                'fleet_type' => 'Trailer',
                'plate_no' => 'B 9dd',
                'driver' => 'Mike Johnson',
                'status' => 'Delivered',

                'marketing_name' => 'Administrator',
                'temperature_max' => '',
                'temperature_min' => '',
                'end_time' => '',
                'start_time' => '',
                'note' => '',
                'name' => 'Harddisk',
                'qty' => '2',
                'volume' => '12',
                'weight' => '100'
            ],
            [

                'do_number' => 'DO-00168',
                'shipment_no' => 'QN-15052022-D005',
                'departure_date' => '2022-01-10',
                'customer_name' => 'PT oouhb',
                'origin' => 'wwl ttv',
                'destination' => 'Pabrik XYZ',
                'fleet_category' => 'Trailer',
                'fleet_type' => 'Trailer',
                'plate_no' => 'B 9dd',
                'driver' => 'Mike Johnson',
                'status' => 'Delivered',

                'marketing_name' => 'Administrator',
                'temperature_max' => '',
                'temperature_min' => '',
                'end_time' => '',
                'start_time' => '',
                'note' => '',
                'name' => 'Harddisk',
                'qty' => '2',
                'volume' => '12',
                'weight' => '100'
            ],
            [

                'do_number' => 'DO-00168',
                'shipment_no' => 'QN-15052022-D005',
                'departure_date' => '2022-01-10',
                'customer_name' => 'PT oouhb',
                'origin' => 'wwl ttv',
                'destination' => 'Pabrik XYZ',
                'fleet_category' => 'Trailer',
                'fleet_type' => 'Trailer',
                'plate_no' => 'B 9dd',
                'driver' => 'Mike Johnson',
                'status' => 'Delivered',

                'marketing_name' => 'Administrator',
                'temperature_max' => '',
                'temperature_min' => '',
                'end_time' => '',
                'start_time' => '',
                'note' => '',
                'name' => 'Harddisk',
                'qty' => '2',
                'volume' => '12',
                'weight' => '100'
            ],
            [

                'do_number' => 'DO-00168',
                'shipment_no' => 'QN-15052022-D005',
                'departure_date' => '2022-01-10',
                'customer_name' => 'PT oouhb',
                'origin' => 'wwl ttv',
                'destination' => 'Pabrik XYZ',
                'fleet_category' => 'Trailer',
                'fleet_type' => 'Trailer',
                'plate_no' => 'B 9dd',
                'driver' => 'Mike Johnson',
                'status' => 'Delivered',

                'marketing_name' => 'Administrator',
                'temperature_max' => '',
                'temperature_min' => '',
                'end_time' => '',
                'start_time' => '',
                'note' => '',
                'name' => 'Harddisk',
                'qty' => '2',
                'volume' => '12',
                'weight' => '100'
            ],
            [

                'do_number' => 'DO-00168',
                'shipment_no' => 'QN-15052022-D005',
                'departure_date' => '2022-01-10',
                'customer_name' => 'PT oouhb',
                'origin' => 'wwl ttv',
                'destination' => 'Pabrik XYZ',
                'fleet_category' => 'Trailer',
                'fleet_type' => 'Trailer',
                'plate_no' => 'B 9dd',
                'driver' => 'Mike Johnson',
                'status' => 'Delivered',

                'marketing_name' => 'Administrator',
                'temperature_max' => '',
                'temperature_min' => '',
                'end_time' => '',
                'start_time' => '',
                'note' => '',
                'name' => 'Harddisk',
                'qty' => '2',
                'volume' => '12',
                'weight' => '100'
            ],
            [

                'do_number' => 'DO-00168',
                'shipment_no' => 'QN-15052022-D005',
                'departure_date' => '2022-01-10',
                'customer_name' => 'PT oouhb',
                'origin' => 'wwl ttv',
                'destination' => 'Pabrik XYZ',
                'fleet_category' => 'Trailer',
                'fleet_type' => 'Trailer',
                'plate_no' => 'B 9dd',
                'driver' => 'Mike Johnson',
                'status' => 'Delivered',

                'marketing_name' => 'Administrator',
                'temperature_max' => '',
                'temperature_min' => '',
                'end_time' => '',
                'start_time' => '',
                'note' => '',
                'name' => 'Harddisk',
                'qty' => '2',
                'volume' => '12',
                'weight' => '100'
            ],
            [

                'do_number' => 'DO-00168',
                'shipment_no' => 'QN-15052022-D005',
                'departure_date' => '2022-01-10',
                'customer_name' => 'PT oouhb',
                'origin' => 'wwl ttv',
                'destination' => 'Pabrik XYZ',
                'fleet_category' => 'Trailer',
                'fleet_type' => 'Trailer',
                'plate_no' => 'B 9dd',
                'driver' => 'Mike Johnson',
                'status' => 'Delivered',

                'marketing_name' => 'Administrator',
                'temperature_max' => '',
                'temperature_min' => '',
                'end_time' => '',
                'start_time' => '',
                'note' => '',
                'name' => 'Harddisk',
                'qty' => '2',
                'volume' => '12',
                'weight' => '100'
            ],
            [

                'do_number' => 'DO-00168',
                'shipment_no' => 'QN-15052022-D005',
                'departure_date' => '2022-01-10',
                'customer_name' => 'PT oouhb',
                'origin' => 'wwl ttv',
                'destination' => 'Pabrik XYZ',
                'fleet_category' => 'Trailer',
                'fleet_type' => 'Trailer',
                'plate_no' => 'B 9dd',
                'driver' => 'Mike Johnson',
                'status' => 'Delivered',

                'marketing_name' => 'Administrator',
                'temperature_max' => '',
                'temperature_min' => '',
                'end_time' => '',
                'start_time' => '',
                'note' => '',
                'name' => 'Harddisk',
                'qty' => '2',
                'volume' => '12',
                'weight' => '100'
            ],
            [

                'do_number' => 'DO-00168',
                'shipment_no' => 'QN-15052022-D005',
                'departure_date' => '2022-01-10',
                'customer_name' => 'PT oouhb',
                'origin' => 'wwl ttv',
                'destination' => 'Pabrik XYZ',
                'fleet_category' => 'Trailer',
                'fleet_type' => 'Trailer',
                'plate_no' => 'B 9dd',
                'driver' => 'Mike Johnson',
                'status' => 'Delivered',

                'marketing_name' => 'Administrator',
                'temperature_max' => '',
                'temperature_min' => '',
                'end_time' => '',
                'start_time' => '',
                'note' => '',
                'name' => 'Harddisk',
                'qty' => '2',
                'volume' => '12',
                'weight' => '100'
            ],
            [

                'do_number' => 'DO-00168',
                'shipment_no' => 'QN-15052022-D005',
                'departure_date' => '2022-01-10',
                'customer_name' => 'PT oouhb',
                'origin' => 'wwl ttv',
                'destination' => 'Pabrik XYZ',
                'fleet_category' => 'Trailer',
                'fleet_type' => 'Trailer',
                'plate_no' => 'B 9dd',
                'driver' => 'Mike Johnson',
                'status' => 'Delivered',

                'marketing_name' => 'Administrator',
                'temperature_max' => '',
                'temperature_min' => '',
                'end_time' => '',
                'start_time' => '',
                'note' => '',
                'name' => 'Harddisk',
                'qty' => '2',
                'volume' => '12',
                'weight' => '100'
            ],


        ];
    }

    // app/Http/Controllers/TrackingFleetController.php
    public function index(Request $request)
    {

        // Ambil parameter sorting dengan nilai default


        $titleMain = 'List Order Shipment';

        $tfListOrders = [];

        // Kirim variabel sortField dan sortOrder ke view
        return view('TrackingFleet.tf-list-order', compact('tfListOrders', 'titleMain'));
    }

    public function getTflistOrder(Request $request)
    {
        if (!$request->ajax()) {
            abort(403, 'Unauthorized access'); // Kembalikan error 403 jika bukan AJAX
        }

        $tfListOrders = Collection::make($this->getDummyData());


        // Filter berdasarkan rentang tanggal
        $from = $request->input('from');
        $to = $request->input('to');

        if ($from && $to) {
            $fromDate = Carbon::parse($from)->startOfDay();
            $toDate = Carbon::parse($to)->endOfDay();

            $tfListOrders = $tfListOrders->filter(function ($item) use ($fromDate, $toDate) {
                $departureDate = Carbon::parse($item['departure_date']);
                return $departureDate->between($fromDate, $toDate);
            });
        }

        return DataTables::of($tfListOrders)
            ->addIndexColumn()
            ->addColumn('actions', function ($item) {
                return '<a href="/tf-list-order/' . $item['shipment_no'] . '" class="transition-all duration-300 ease-in-out hover:text-stone-500">' . '<i class="fa-solid fa-magnifying-glass"></i>' . '</a>';
            })

            ->rawColumns(['actions'])
            ->make(true);

    }

    public function show($shipment_no)
    {
        // Ambil data dummy
        $data = $this->getDummyData();

        // Cari data berdasarkan shipment_no
        $orders = Collection::make($data)->firstWhere('shipment_no', $shipment_no);

        // Jika data tidak ditemukan, kembalikan error 404
        if (!$orders) {
            abort(404, 'Order not found');
        }

        $titleMain = ucfirst('Detail Order');

        // Kirim data ke view
        return view('TrackingFleet.tf-list-order', compact('orders', 'titleMain'));
    }
}
