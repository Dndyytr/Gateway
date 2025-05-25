<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $chartData = [
            'customers' => [
                ['name' => 'PT. ABCD', 'value' => 30],
                ['name' => 'PT. EFGH', 'value' => 16],
                ['name' => 'PT. IJKL', 'value' => 11],
            ],
            'countries' => [
                ['name' => 'India', 'value' => 50],
                ['name' => 'Kosovo', 'value' => 25],
                ['name' => 'Belgium', 'value' => 20],
            ],
        ];

        $dataDashboard = [
            [
                'title' => 'Quote on Going',
                'amount_data' => 14,
            ],
            [
                'title' => 'Shipment on Going',
                'amount_data' => 0,
            ],
            [
                'title' => 'Shipment Completed',
                'amount_data' => 0,
            ],
        ];

        $colorPalette = [
            '#1c398e',
            '#51a2ff',
            '#ff6900',
        ];


        return view('dashboard', compact('chartData', 'dataDashboard', 'colorPalette'));
    }


}
