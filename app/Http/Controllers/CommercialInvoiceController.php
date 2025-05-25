<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;

class CommercialInvoiceController extends Controller
{
    // app/Http/Controllers/CommercialInvoiceController.php
    public function index(Request $request)
    {

        $commercialInvoices = [];

        return view('CommercialInvoice.commercial-invoice', compact('commercialInvoices'));
    }

    public function getCommercialInvoices(Request $request)
    {
        if (!$request->ajax()) {
            abort(403, 'Unauthorized access'); // Kembalikan error 403 jika bukan AJAX
        }

        $commercialInvoices = [
            [
                'quoteType' => 'Air Freight Shipment',
                'shipmentNumber' => 'QN-14052022-0002',
                'shipmentDate' => '14/05/2022 00:13',
                'quoteNumber' => 'QN-14052022-0002',
                'quoteDate' => '14/05/2022 00:13',
                'typeOfTrade' => 'Ex',
                'invoice' => 'Download',
                'invoiceUrl' => '/path/to/invoice1.pdf',
                'status' => 'Paid',
            ],
            [
                'quoteType' => 'Full Container Load',
                'shipmentNumber' => 'QN-14052022-0006',
                'shipmentDate' => '14/05/2022 02:20',
                'quoteNumber' => 'QN-14052022-0006',
                'quoteDate' => '14/05/2022 02:20',
                'typeOfTrade' => 'Ex',
                'invoice' => 'Not uploaded',
                'invoiceUrl' => null,
                'status' => 'Unpaid',
            ],
            [
                'quoteType' => 'Full Container Load',
                'shipmentNumber' => 'QN-14052022-0005',
                'shipmentDate' => '14/05/2022 02:15',
                'quoteNumber' => 'QN-14052022-0005',
                'quoteDate' => '14/05/2022 02:15',
                'typeOfTrade' => 'Ex',
                'invoice' => 'Not uploaded',
                'invoiceUrl' => '/path/to/invoice2.pdf',
                'status' => 'Unpaid',
            ],
            [
                'quoteType' => 'Full Container Load',
                'shipmentNumber' => 'QN-14052022-0005',
                'shipmentDate' => '14/05/2022 02:15',
                'quoteNumber' => 'QN-14052022-0005',
                'quoteDate' => '14/05/2022 02:15',
                'typeOfTrade' => 'Ex',
                'invoice' => 'Not uploaded',
                'invoiceUrl' => '/path/to/invoice2.pdf',
                'status' => 'Unpaid',
            ],
            [
                'quoteType' => 'Full Container Load',
                'shipmentNumber' => 'QN-14052022-0005',
                'shipmentDate' => '14/05/2022 02:15',
                'quoteNumber' => 'QN-14052022-0005',
                'quoteDate' => '14/05/2022 02:15',
                'typeOfTrade' => 'Ex',
                'invoice' => 'Not uploaded',
                'invoiceUrl' => '/path/to/invoice2.pdf',
                'status' => 'Unpaid',
            ],
            [
                'quoteType' => 'Full Container Load',
                'shipmentNumber' => 'QN-14052022-0005',
                'shipmentDate' => '14/05/2022 02:15',
                'quoteNumber' => 'QN-14052022-0005',
                'quoteDate' => '14/05/2022 02:15',
                'typeOfTrade' => 'Ex',
                'invoice' => 'Not uploaded',
                'invoiceUrl' => '/path/to/invoice2.pdf',
                'status' => 'Unpaid',
            ],
            [
                'quoteType' => 'Full Container Load',
                'shipmentNumber' => 'QN-14052022-0005',
                'shipmentDate' => '14/05/2022 02:15',
                'quoteNumber' => 'QN-14052022-0005',
                'quoteDate' => '14/05/2022 02:15',
                'typeOfTrade' => 'Ex',
                'invoice' => 'Not uploaded',
                'invoiceUrl' => '/path/to/invoice2.pdf',
                'status' => 'Unpaid',
            ],
            [
                'quoteType' => 'Full Container Load',
                'shipmentNumber' => 'QN-14052022-0005',
                'shipmentDate' => '14/05/2022 02:15',
                'quoteNumber' => 'QN-14052022-0005',
                'quoteDate' => '14/05/2022 02:15',
                'typeOfTrade' => 'Ex',
                'invoice' => 'Not uploaded',
                'invoiceUrl' => '/path/to/invoice2.pdf',
                'status' => 'Unpaid',
            ],
            [
                'quoteType' => 'Full Container Load',
                'shipmentNumber' => 'QN-14052022-0005',
                'shipmentDate' => '14/05/2022 02:15',
                'quoteNumber' => 'QN-14052022-0005',
                'quoteDate' => '14/05/2022 02:15',
                'typeOfTrade' => 'Ex',
                'invoice' => 'Not uploaded',
                'invoiceUrl' => '/path/to/invoice2.pdf',
                'status' => 'Unpaid',
            ],
            [
                'quoteType' => 'Full Container Load',
                'shipmentNumber' => 'QN-14052022-0005',
                'shipmentDate' => '14/05/2022 02:15',
                'quoteNumber' => 'QN-14052022-0005',
                'quoteDate' => '14/05/2022 02:15',
                'typeOfTrade' => 'Ex',
                'invoice' => 'Not uploaded',
                'invoiceUrl' => '/path/to/invoice2.pdf',
                'status' => 'Unpaid',
            ],
            [
                'quoteType' => 'Full Container Load',
                'shipmentNumber' => 'QN-14052022-0005',
                'shipmentDate' => '14/05/2022 02:15',
                'quoteNumber' => 'QN-14052022-0005',
                'quoteDate' => '14/05/2022 02:15',
                'typeOfTrade' => 'Ex',
                'invoice' => 'Not uploaded',
                'invoiceUrl' => '/path/to/invoice2.pdf',
                'status' => 'Unpaid',
            ],
            [
                'quoteType' => 'Full Container Load',
                'shipmentNumber' => 'QN-14052022-0005',
                'shipmentDate' => '14/05/2022 02:15',
                'quoteNumber' => 'QN-14052022-0005',
                'quoteDate' => '14/05/2022 02:15',
                'typeOfTrade' => 'Ex',
                'invoice' => 'Not uploaded',
                'invoiceUrl' => '/path/to/invoice2.pdf',
                'status' => 'Unpaid',
            ],
            [
                'quoteType' => 'Full Container Load',
                'shipmentNumber' => 'QN-14052022-0005',
                'shipmentDate' => '14/05/2022 02:15',
                'quoteNumber' => 'QN-14052022-0005',
                'quoteDate' => '14/05/2022 02:15',
                'typeOfTrade' => 'Ex',
                'invoice' => 'Not uploaded',
                'invoiceUrl' => '/path/to/invoice2.pdf',
                'status' => 'Unpaid',
            ],
            [
                'quoteType' => 'Full Container Load',
                'shipmentNumber' => 'QN-14052022-0005',
                'shipmentDate' => '14/05/2022 02:15',
                'quoteNumber' => 'QN-14052022-0005',
                'quoteDate' => '14/05/2022 02:15',
                'typeOfTrade' => 'Ex',
                'invoice' => 'Not uploaded',
                'invoiceUrl' => '/path/to/invoice2.pdf',
                'status' => 'Unpaid',
            ],
            [
                'quoteType' => 'Full Container Load',
                'shipmentNumber' => 'QN-14052022-0005',
                'shipmentDate' => '14/05/2022 02:15',
                'quoteNumber' => 'QN-14052022-0005',
                'quoteDate' => '14/05/2022 02:15',
                'typeOfTrade' => 'Ex',
                'invoice' => 'Not uploaded',
                'invoiceUrl' => '/path/to/invoice2.pdf',
                'status' => 'Unpaid',
            ],
            [
                'quoteType' => 'Full Container Load',
                'shipmentNumber' => 'QN-14052022-0005',
                'shipmentDate' => '14/05/2022 02:15',
                'quoteNumber' => 'QN-14052022-0005',
                'quoteDate' => '14/05/2022 02:15',
                'typeOfTrade' => 'Ex',
                'invoice' => 'Not uploaded',
                'invoiceUrl' => '/path/to/invoice2.pdf',
                'status' => 'Unpaid',
            ],
            [
                'quoteType' => 'Full Container Load',
                'shipmentNumber' => 'QN-14052022-0005',
                'shipmentDate' => '14/05/2022 02:15',
                'quoteNumber' => 'QN-14052022-0005',
                'quoteDate' => '14/05/2022 02:15',
                'typeOfTrade' => 'Ex',
                'invoice' => 'Not uploaded',
                'invoiceUrl' => '/path/to/invoice2.pdf',
                'status' => 'Unpaid',
            ],
            [
                'quoteType' => 'Full Container Load',
                'shipmentNumber' => 'QN-14052022-0005',
                'shipmentDate' => '14/05/2022 02:15',
                'quoteNumber' => 'QN-14052022-0005',
                'quoteDate' => '14/05/2022 02:15',
                'typeOfTrade' => 'Ex',
                'invoice' => 'Not uploaded',
                'invoiceUrl' => '/path/to/invoice2.pdf',
                'status' => 'Unpaid',
            ],
            [
                'quoteType' => 'Full Container Load',
                'shipmentNumber' => 'QN-14052022-0005',
                'shipmentDate' => '14/05/2022 02:15',
                'quoteNumber' => 'QN-14052022-0005',
                'quoteDate' => '14/05/2022 02:15',
                'typeOfTrade' => 'Ex',
                'invoice' => 'Not uploaded',
                'invoiceUrl' => '/path/to/invoice2.pdf',
                'status' => 'Unpaid',
            ],
            [
                'quoteType' => 'Full Container Load',
                'shipmentNumber' => 'QN-14052022-0005',
                'shipmentDate' => '14/05/2022 02:15',
                'quoteNumber' => 'QN-14052022-0005',
                'quoteDate' => '14/05/2022 02:15',
                'typeOfTrade' => 'Ex',
                'invoice' => 'Not uploaded',
                'invoiceUrl' => '/path/to/invoice2.pdf',
                'status' => 'Unpaid',
            ],
            [
                'quoteType' => 'Full Container Load',
                'shipmentNumber' => 'QN-14052022-0005',
                'shipmentDate' => '14/05/2022 02:15',
                'quoteNumber' => 'QN-14052022-0005',
                'quoteDate' => '14/05/2022 02:15',
                'typeOfTrade' => 'Ex',
                'invoice' => 'Not uploaded',
                'invoiceUrl' => '/path/to/invoice2.pdf',
                'status' => 'Unpaid',
            ],
            [
                'quoteType' => 'Full Container Load',
                'shipmentNumber' => 'QN-14052022-0005',
                'shipmentDate' => '14/05/2022 02:15',
                'quoteNumber' => 'QN-14052022-0005',
                'quoteDate' => '14/05/2022 02:15',
                'typeOfTrade' => 'Ex',
                'invoice' => 'Not uploaded',
                'invoiceUrl' => '/path/to/invoice2.pdf',
                'status' => 'Unpaid',
            ],
            [
                'quoteType' => 'Full Container Load',
                'shipmentNumber' => 'QN-14052022-0005',
                'shipmentDate' => '14/05/2022 02:15',
                'quoteNumber' => 'QN-14052022-0005',
                'quoteDate' => '14/05/2022 02:15',
                'typeOfTrade' => 'Ex',
                'invoice' => 'Not uploaded',
                'invoiceUrl' => '/path/to/invoice2.pdf',
                'status' => 'Unpaid',
            ],


        ];

        $collection = Collection::make($commercialInvoices);

        return DataTables::of($collection)
            ->addIndexColumn()
            ->addColumn('invoice', function ($item) {
                if ($item['invoice'] !== 'Not uploaded') {
                    return '<a class="rounded-xs bg-warnaBiruTua p-1 text-white transition-all duration-300 ease-in-out hover:bg-warnaBiruHover" href="' . $item['invoiceUrl'] . '" target="_blank">Download</a>';
                }
                return 'Not uploaded';
            })
            ->addColumn('status', function ($item) {
                if ($item['invoice'] !== 'Not uploaded') {
                    $statusHtml = '';
                    if ($item['status'] === 'Paid') {
                        $statusHtml .= '<a class="rounded-xs bg-warnaHijauApprove p-1 transition-all duration-300 ease-in-out hover:bg-green-300" href="#">Paid</a>';
                    } else {
                        $statusHtml .= '<a class="cursor-pointer rounded-xs bg-warnaMerahTombol p-1" data-shipment-number="' . $item['shipmentNumber'] . '" data-status="Paid">Paid</a>';
                    }
                    if ($item['status'] === 'Unpaid') {
                        $statusHtml .= '<a class="rounded-xs bg-warnaMerahTombol p-1" href="#">Unpaid</a>';
                    } else {
                        $statusHtml .= '<a class="cursor-pointer rounded-xs bg-warnaMerahTombol p-1 transition-all duration-300 ease-in-out hover:bg-red-300" data-shipment-number="' . $item['shipmentNumber'] . '" data-status="Unpaid">Unpaid</a>';
                    }
                    return '<span class="flex flex-wrap gap-1 text-white">' . $statusHtml . '</span>';
                }
                return '';
            })
            ->addColumn('actions', function ($item) {
                return '<span class="flex flex-wrap gap-1 text-white">' .
                    '<button onclick="window.open(\'/commercial-invoice/history/' . $item['shipmentNumber'] . '\', \'_blank\', \'location=yes,height=570,width=520,scrollbars=yes,status=yes\')" class="rounded-xs cursor-pointer bg-warnaBiruTua p-1 transition-all duration-300 ease-in-out hover:bg-warnaBiruHover">History</button>' .
                    '<button x-on:click="openUploadInvoice(\'/commercial-invoice/upload-invoice/' . $item['shipmentNumber'] . '\')"  class="rounded-xs cursor-pointer bg-warnaBiruTua p-1 transition-all duration-300 ease-in-out hover:bg-warnaBiruHover">Upload Invoicing</button>'
                    . '</span>';
            })
            ->rawColumns(['invoice', 'status', 'actions'])
            ->make(true);
    }

    // app/Http/Controllers/CommercialInvoiceController.php

    public function uploadInvoice(Request $request, $shipmentNumber)
    {

        return redirect()->route('commercial-invoice.index')->with('success', 'Data Uploaded Successful');
    }

    public function historyInvoice(Request $request)
    {
        return view('CommercialInvoice.history-invoice');
    }

    // Fungsi untuk mengonversi tanggal ke timestamp
    // private function parseDate($dateString)
    // {
    //     $parts = explode(' ', $dateString);
    //     $datePart = $parts[0];
    //     $timePart = $parts[1];
    //     list($day, $month, $year) = array_map('intval', explode('/', $datePart));
    //     list($hours, $minutes) = array_map('intval', explode(':', $timePart));
    //     return mktime($hours, $minutes, 0, $month, $day, $year);
    // }

    // Method untuk mengubah status (opsional)
    // public function updateStatus(Request $request)
    // {
    //     $shipmentNumber = $request->input('shipmentNumber');
    //     $newStatus = $request->input('status');
    //     return response()->json(['success' => true, 'message' => 'Status updated']);
    // }

}
