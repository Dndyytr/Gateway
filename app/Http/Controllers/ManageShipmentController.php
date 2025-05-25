<?php

namespace App\Http\Controllers;

use App\Models\ManageShipmentModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;

class ManageShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($status)
    {
        if (!in_array($status, ['pending', 'on-progress', 'completed', 'rejected', 'cancel'])) {
            abort(404);
        }

        return view('ManageShipment.manage-shipment', compact('status'));
    }

    public function pending(Request $request)
    {
        $dataPending = [
            [
                'quote_number' => 'QN-14052022-0006',
                'quote_type' => 'Full Container Load',
                'quote_date' => '14/05/2022 02:20',
                'type_of_trade' => 'Ex',
                'origin_country' => 'Indonesia',
                'origin_city' => 'Jakarta Utara',
                'destination_country' => 'Malaysia',
                'destination_city' => 'Kuala Lumpur',
                'shipping_instruction' => '39',
                'status' => 'Booked',
                'reason' => ''
            ],
            [
                'quote_number' => 'QN-14052022-0005',
                'quote_type' => 'Full Container Load',
                'quote_date' => '14/05/2022 02:15',
                'type_of_trade' => 'Ex',
                'origin_country' => 'Indonesia',
                'origin_city' => 'Jakarta Utara',
                'destination_country' => 'Malaysia',
                'destination_city' => 'Kuala Lumpur',
                'shipping_instruction' => '38',
                'status' => 'Booked',
                'reason' => ''
            ],
            [
                'quote_number' => 'QN-14052022-0004',
                'quote_type' => 'Full Container Load',
                'quote_date' => '14/05/2022 01:43',
                'type_of_trade' => 'Ex',
                'origin_country' => 'Indonesia',
                'origin_city' => 'Jakarta Utara',
                'destination_country' => 'Malaysia',
                'destination_city' => 'Kuala Lumpur',
                'shipping_instruction' => '38',
                'status' => 'Quotation',
                'reason' => ''
            ],
            [
                'quote_number' => 'QN-14052022-0003',
                'quote_type' => 'Full Container Load',
                'quote_date' => '14/05/2022 01:17',
                'type_of_trade' => 'Ex',
                'origin_country' => 'Indonesia',
                'origin_city' => 'Jakarta Utara',
                'destination_country' => 'Malaysia',
                'destination_city' => 'Kuala Lumpur',
                'shipping_instruction' => '38',
                'status' => 'Quotation',
                'reason' => ''
            ],
            [
                'quote_number' => 'QN-14052022-0002',
                'quote_type' => 'Full Container Load',
                'quote_date' => '14/05/2022 00:13',
                'type_of_trade' => 'Ex',
                'origin_country' => 'Indonesia',
                'origin_city' => 'Jakarta Utara',
                'destination_country' => 'Malaysia',
                'destination_city' => 'Kuala Lumpur',
                'shipping_instruction' => '38',
                'status' => 'Quotation',
                'reason' => ''
            ],
            [
                'quote_number' => 'QN-14052022-0001',
                'quote_type' => 'Full Container Load',
                'quote_date' => '13/05/2022 23:04',
                'type_of_trade' => 'Ex',
                'origin_country' => 'Indonesia',
                'origin_city' => 'Jakarta Utara',
                'destination_country' => 'Malaysia',
                'destination_city' => 'Kuala Lumpur',
                'shipping_instruction' => '38',
                'status' => 'Quotation',
                'reason' => ''
            ],
            [
                'quote_number' => 'QN-14052022-0001',
                'quote_type' => 'Custom Only',
                'quote_date' => '13/05/2022 23:04',
                'type_of_trade' => 'Ex',
                'origin_country' => 'Indonesia',
                'origin_city' => 'Jakarta Utara',
                'destination_country' => 'Malaysia',
                'destination_city' => 'Kuala Lumpur',
                'shipping_instruction' => '38',
                'status' => 'Quotation',
                'reason' => ''
            ],
            [
                'quote_number' => 'QN-14052022-0001',
                'quote_type' => 'Custom Only',
                'quote_date' => '13/05/2022 23:04',
                'type_of_trade' => 'Ex',
                'origin_country' => 'Indonesia',
                'origin_city' => 'Jakarta Utara',
                'destination_country' => 'Malaysia',
                'destination_city' => 'Kuala Lumpur',
                'shipping_instruction' => '38',
                'status' => 'Quotation',
                'reason' => ''
            ],
            [
                'quote_number' => 'QN-14052022-0001',
                'quote_type' => 'Custom Only',
                'quote_date' => '13/05/2022 23:04',
                'type_of_trade' => 'Ex',
                'origin_country' => 'Indonesia',
                'origin_city' => 'Jakarta Utara',
                'destination_country' => 'Malaysia',
                'destination_city' => 'Kuala Lumpur',
                'shipping_instruction' => '38',
                'status' => 'Quotation',
                'reason' => ''
            ],
            [
                'quote_number' => 'QN-14052022-0001',
                'quote_type' => 'Custom Only',
                'quote_date' => '13/05/2022 23:04',
                'type_of_trade' => 'Ex',
                'origin_country' => 'Indonesia',
                'origin_city' => 'Jakarta Utara',
                'destination_country' => 'Malaysia',
                'destination_city' => 'Kuala Lumpur',
                'shipping_instruction' => '38',
                'status' => 'Quotation',
                'reason' => ''
            ],
            [
                'quote_number' => 'QN-14052022-0001',
                'quote_type' => 'Custom Only',
                'quote_date' => '13/05/2022 23:04',
                'type_of_trade' => 'Ex',
                'origin_country' => 'Indonesia',
                'origin_city' => 'Jakarta Utara',
                'destination_country' => 'Malaysia',
                'destination_city' => 'Kuala Lumpur',
                'shipping_instruction' => '38',
                'status' => 'Quotation',
                'reason' => ''
            ],
            [
                'quote_number' => 'QN-14052022-0001',
                'quote_type' => 'Custom Only',
                'quote_date' => '13/05/2022 23:04',
                'type_of_trade' => 'Ex',
                'origin_country' => 'Indonesia',
                'origin_city' => 'Jakarta Utara',
                'destination_country' => 'Malaysia',
                'destination_city' => 'Kuala Lumpur',
                'shipping_instruction' => '38',
                'status' => 'Quotation',
                'reason' => ''
            ],
            [
                'quote_number' => 'QN-14052022-0001',
                'quote_type' => 'Custom Only',
                'quote_date' => '13/05/2022 23:04',
                'type_of_trade' => 'Ex',
                'origin_country' => 'Indonesia',
                'origin_city' => 'Jakarta Utara',
                'destination_country' => 'Malaysia',
                'destination_city' => 'Kuala Lumpur',
                'shipping_instruction' => '38',
                'status' => 'Quotation',
                'reason' => ''
            ],
            [
                'quote_number' => 'QN-14052022-0001',
                'quote_type' => 'Custom Only',
                'quote_date' => '13/05/2022 23:04',
                'type_of_trade' => 'Ex',
                'origin_country' => 'Indonesia',
                'origin_city' => 'Jakarta Utara',
                'destination_country' => 'Malaysia',
                'destination_city' => 'Kuala Lumpur',
                'shipping_instruction' => '38',
                'status' => 'Quotation',
                'reason' => ''
            ],
            [
                'quote_number' => 'QN-14052022-0001',
                'quote_type' => 'Custom Only',
                'quote_date' => '13/05/2022 23:04',
                'type_of_trade' => 'Ex',
                'origin_country' => 'Indonesia',
                'origin_city' => 'Jakarta Utara',
                'destination_country' => 'Malaysia',
                'destination_city' => 'Kuala Lumpur',
                'shipping_instruction' => '38',
                'status' => 'Quotation',
                'reason' => ''
            ],
            [
                'quote_number' => 'QN-14052022-0001',
                'quote_type' => 'Custom Only',
                'quote_date' => '13/05/2022 23:04',
                'type_of_trade' => 'Ex',
                'origin_country' => 'Indonesia',
                'origin_city' => 'Jakarta Utara',
                'destination_country' => 'Malaysia',
                'destination_city' => 'Kuala Lumpur',
                'shipping_instruction' => '38',
                'status' => 'Quotation',
                'reason' => ''
            ],
            [
                'quote_number' => 'QN-14052022-0001',
                'quote_type' => 'Custom Only',
                'quote_date' => '13/05/2022 23:04',
                'type_of_trade' => 'Ex',
                'origin_country' => 'Indonesia',
                'origin_city' => 'Jakarta Utara',
                'destination_country' => 'Malaysia',
                'destination_city' => 'Kuala Lumpur',
                'shipping_instruction' => '38',
                'status' => 'Quotation',
                'reason' => ''
            ],
            [
                'quote_number' => 'QN-14052022-0001',
                'quote_type' => 'Custom Only',
                'quote_date' => '13/05/2022 23:04',
                'type_of_trade' => 'Ex',
                'origin_country' => 'Indonesia',
                'origin_city' => 'Jakarta Utara',
                'destination_country' => 'Malaysia',
                'destination_city' => 'Kuala Lumpur',
                'shipping_instruction' => '38',
                'status' => 'Quotation',
                'reason' => ''
            ],
            [
                'quote_number' => 'QN-14052022-0001',
                'quote_type' => 'Custom Only',
                'quote_date' => '13/05/2022 23:04',
                'type_of_trade' => 'Ex',
                'origin_country' => 'Indonesia',
                'origin_city' => 'Jakarta Utara',
                'destination_country' => 'Malaysia',
                'destination_city' => 'Kuala Lumpur',
                'shipping_instruction' => '38',
                'status' => 'Quotation',
                'reason' => ''
            ],
        ];

        if (!$request->ajax()) {
            abort(403, 'Unauthorized access');
        }

        $pendings = Collection::make($dataPending);

        // Filter berdasarkan type-of-quotation
        $typeOfQuotation = $request->input('type-of-quotation');
        if ($typeOfQuotation && $typeOfQuotation !== 'all') {
            $pendings = $pendings->filter(function ($item) use ($typeOfQuotation) {
                $quoteTypeMap = [
                    'full-container-load' => 'Full Container Load',
                    'less-container-load' => 'Less Container Load',
                    'non-container-shipment' => 'Non Container Shipment',
                    'air-freight-shipment' => 'Air Freight Shipment',
                    'charter-full-truck' => 'Charter Full Truck',
                    'less-truck-load' => 'Less Truck Load',
                    'custom-only' => 'Custom Only',
                ];
                $expectedQuoteType = $quoteTypeMap[$typeOfQuotation] ?? '';
                return $item['quote_type'] === $expectedQuoteType;
            });
        }

        return DataTables::of($pendings)
            ->addIndexColumn()
            ->addColumn('actions', function ($item) {
                if ($item['status'] === 'Booked') {
                    return '<span class="flex flex-wrap gap-1">' .
                        '<a class="text-white rounded-sm bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-blue-500" href="/manage-shipment/pending/' . $item['quote_number'] . '">' .
                        '<i class="fa-solid fa-pen-to-square mr-1"></i> Edit' .
                        '</a> ' .

                        '<button class="text-white cursor-pointer rounded-sm bg-warnaMerahTombol px-2 py-1 transition-all duration-300 ease-in-out hover:bg-red-300" x-on:click="openDeleteModal(\'manage-shipment/pending/' . $item['quote_number'] . '\')">' .
                        '<i class="fa-solid fa-trash-can mr-1"></i> Reject' .
                        '</button> ' .

                        '<a class="text-white cursor-pointer rounded-sm bg-warnaHijauApprove px-2 py-1 transition-all duration-300 ease-in-out hover:bg-green-300" href="/manage-shipment/approve/' . $item['quote_number'] . '">' .
                        '<i class="fa-regular fa-circle-check mr-1"></i> Approve' .
                        '</a>'
                        . '</span>';
                } elseif ($item['status'] === 'Quotation') {
                    return ' <span class="flex flex-wrap gap-1">' .
                        '<a class="text-white rounded-sm bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-blue-500" href="/manage-shipment/pending/' . $item['quote_number'] . '">' .
                        '<i class="fa-solid fa-pen-to-square mr-1"></i> Edit' .
                        '</a>' .
                        '<button class="text-white cursor-pointer rounded-sm bg-warnaMerahTombol px-2 py-1 transition-all duration-300 ease-in-out hover:bg-red-300" x-on:click="openDeleteModal(\'' . $item['quote_number'] . '\')">' .
                        '<i class="fa-solid fa-trash-can mr-1"></i> Reject' .
                        '</button>'
                        . '</span>';
                }
                return '';
            })
            ->addColumn('status', function ($item) {
                if ($item['status']) {
                    return ' <span class="inline-block rounded-full bg-slate-300 px-2 py-1 text-center text-warnaBiruTua md:w-full">' .
                        '' . $item['status'] . ' <i class="ml-[2px] fa-solid fa-bars-staggered"></i>' .
                        '</span>';
                }
                return '';
            })
            ->addColumn('shipping_instruction', function ($item) {
                return '<a class="rounded-sm text-white bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-blue-500" href=" ' . $item['shipping_instruction'] . '">View</a>';
            })

            ->rawColumns(['actions', 'status', 'shipping_instruction'])
            ->make(true);
    }

    public function cancel(Request $request)
    {
        $dataCancel = [
            [
                'quote_number' => 'QN-14052022-0001',
                'quote_type' => 'Custom Only',
                'quote_date' => '13/05/2022 23:04',
                'type_of_trade' => 'Ex',
                'origin_country' => 'Indonesia',
                'origin_city' => 'Jakarta Utara',
                'destination_country' => 'Malaysia',
                'destination_city' => 'Kuala Lumpur',
                'shipping_instruction' => '38',
                'status' => 'Cancel',
                'reason' => ''
            ],
        ];

        if (!$request->ajax()) {
            abort(403, 'Unauthorized access');
        }

        $cancels = Collection::make($dataCancel);

        // Filter berdasarkan type-of-quotation
        $typeOfQuotation = $request->input('type-of-quotation');
        if ($typeOfQuotation && $typeOfQuotation !== 'all') {
            $cancels = $cancels->filter(function ($item) use ($typeOfQuotation) {
                $quoteTypeMap = [
                    'full-container-load' => 'Full Container Load',
                    'less-container-load' => 'Less Container Load',
                    'non-container-shipment' => 'Non Container Shipment',
                    'air-freight-shipment' => 'Air Freight Shipment',
                    'charter-full-truck' => 'Charter Full Truck',
                    'less-truck-load' => 'Less Truck Load',
                    'custom-only' => 'Custom Only',
                ];
                $expectedQuoteType = $quoteTypeMap[$typeOfQuotation] ?? '';
                return $item['quote_type'] === $expectedQuoteType;
            });
        }

        return DataTables::of($cancels)
            ->addIndexColumn()
            ->addColumn('actions', function ($item) {
                return
                    '<a class="text-white rounded-sm bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-blue-500" href="/manage-shipment/pending/' . $item['quote_number'] . '">' .
                    '<i class="fa-solid fa-pen-to-square mr-1"></i> Edit' .
                    '</a> '
                ;
            })
            ->addColumn('status', function ($item) {
                if ($item['status']) {
                    return ' <span class="inline-block rounded-full bg-slate-300 px-2 py-1 text-center text-warnaBiruTua md:w-full">' .
                        '' . $item['status'] . ' <i class="ml-[2px] fa-solid fa-bars-staggered"></i>' .
                        '</span>';
                }
                return '';
            })
            ->addColumn('shipping_instruction', function ($item) {
                return '<a class="rounded-sm text-white bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-blue-500" href=" ' . $item['shipping_instruction'] . '">View</a>';
            })

            ->rawColumns(['actions', 'status', 'shipping_instruction'])
            ->make(true);
    }
    public function completed(Request $request)
    {
        $dataCompleted = [
            [
                'shipment_number' => 'SN-14052022-0001',
                'quote_type' => 'Custom Only',
                'quote_date' => '13/05/2022 23:04',
                'type_of_trade' => 'Ex',
                'origin_country' => 'Indonesia',
                'origin_city' => 'Jakarta Utara',
                'destination_country' => 'Malaysia',
                'destination_city' => 'Kuala Lumpur',
                'shipping_instruction' => '38',
                'status' => 'Complete',
                'reason' => ''
            ],
        ];

        if (!$request->ajax()) {
            abort(403, 'Unauthorized access');
        }

        $completeds = Collection::make($dataCompleted);

        // Filter berdasarkan type-of-quotation
        $typeOfQuotation = $request->input('type-of-quotation');
        if ($typeOfQuotation && $typeOfQuotation !== 'all') {
            $completeds = $completeds->filter(function ($item) use ($typeOfQuotation) {
                $quoteTypeMap = [
                    'full-container-load' => 'Full Container Load',
                    'less-container-load' => 'Less Container Load',
                    'non-container-shipment' => 'Non Container Shipment',
                    'air-freight-shipment' => 'Air Freight Shipment',
                    'charter-full-truck' => 'Charter Full Truck',
                    'less-truck-load' => 'Less Truck Load',
                    'custom-only' => 'Custom Only',
                ];
                $expectedQuoteType = $quoteTypeMap[$typeOfQuotation] ?? '';
                return $item['quote_type'] === $expectedQuoteType;
            });
        }

        return DataTables::of($completeds)
            ->addIndexColumn()
            ->addColumn('actions', function ($item) {

                return '<span class="flex flex-wrap gap-1">' .
                    '<a class="text-white rounded-sm bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-blue-500" href="/manage-shipment/pending/' . $item['shipment_number'] . '">' .
                    '<i class="fa-solid fa-pen-to-square mr-1"></i> Edit' .
                    '</a> ' .

                    '<a class="text-white cursor-pointer rounded-sm bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-warnaBiruHover" href="/manage-shipment/approve/' . $item['shipment_number'] . '">' .
                    '<i class="fa-solid fa-magnifying-glass mr-1"></i> View Tracking' .
                    '</a>'
                    . '</span>';

            })
            ->addColumn('status', function ($item) {
                if ($item['status']) {
                    return ' <span class="inline-block rounded-full bg-slate-300 px-2 py-1 text-center text-warnaBiruTua md:w-full">' .
                        '' . $item['status'] . ' <i class="ml-[2px] fa-solid fa-bars-staggered"></i>' .
                        '</span>';
                }
                return '';
            })
            ->addColumn('shipping_instruction', function ($item) {
                return '<a class="rounded-sm text-white bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-blue-500" href=" ' . $item['shipping_instruction'] . '">View</a>';
            })

            ->rawColumns(['actions', 'status', 'shipping_instruction'])
            ->make(true);
    }
    public function onProgress(Request $request)
    {
        $dataOnProgress = [
            [
                'quote_number' => 'QN-14052022-0001',
                'quote_type' => 'Custom Only',
                'quote_date' => '13/05/2022 23:04',
                'type_of_trade' => 'Ex',
                'origin_country' => 'Indonesia',
                'origin_city' => 'Jakarta Utara',
                'destination_country' => 'Malaysia',
                'destination_city' => 'Kuala Lumpur',
                'shipping_instruction' => '38',
                'status' => 'On Progress',
                'reason' => ''
            ],
        ];

        if (!$request->ajax()) {
            abort(403, 'Unauthorized access');
        }

        $onProgreses = Collection::make($dataOnProgress);

        // Filter berdasarkan type-of-quotation
        $typeOfQuotation = $request->input('type-of-quotation');
        if ($typeOfQuotation && $typeOfQuotation !== 'all') {
            $onProgreses = $onProgreses->filter(function ($item) use ($typeOfQuotation) {
                $quoteTypeMap = [
                    'full-container-load' => 'Full Container Load',
                    'less-container-load' => 'Less Container Load',
                    'non-container-shipment' => 'Non Container Shipment',
                    'air-freight-shipment' => 'Air Freight Shipment',
                    'charter-full-truck' => 'Charter Full Truck',
                    'less-truck-load' => 'Less Truck Load',
                    'custom-only' => 'Custom Only',
                ];
                $expectedQuoteType = $quoteTypeMap[$typeOfQuotation] ?? '';
                return $item['quote_type'] === $expectedQuoteType;
            });
        }

        return DataTables::of($onProgreses)
            ->addIndexColumn()
            ->addColumn('actions', function ($item) {

                return '<span class="flex flex-wrap gap-1">' .
                    '<a class="text-white rounded-sm bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-blue-500" href="/manage-shipment/pending/' . $item['quote_number'] . '">' .
                    '<i class="fa-solid fa-pen-to-square mr-1"></i> Edit' .
                    '</a> ' .

                    '<button class="text-white cursor-pointer rounded-sm bg-warnaMerahTombol px-2 py-1 transition-all duration-300 ease-in-out hover:bg-red-300" x-on:click="openDeleteModal(\'' . $item['quote_number'] . '\')">' .
                    '<i class="fa-solid fa-trash-can mr-1"></i> Cancel' .
                    '</button> ' .

                    '<a class="text-white cursor-pointer rounded-sm bg-warnaHijauApprove px-2 py-1 transition-all duration-300 ease-in-out hover:bg-green-300" href="/manage-shipment/approve/' . $item['quote_number'] . '">' .
                    '<i class="fa-regular fa-circle-check mr-1"></i> Complete' .
                    '</a>'
                    . '</span>';

            })
            ->addColumn('status', function ($item) {
                if ($item['status']) {
                    return ' <span class="inline-block rounded-full bg-slate-300 px-2 py-1 text-center text-warnaBiruTua md:w-full">' .
                        '' . $item['status'] . ' <i class="ml-[2px] fa-solid fa-bars-staggered"></i>' .
                        '</span>';
                }
                return '';
            })
            ->addColumn('shipping_instruction', function ($item) {
                return '<a class="rounded-sm text-white bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-blue-500" href=" ' . $item['shipping_instruction'] . '">View</a>';
            })

            ->rawColumns(['actions', 'status', 'shipping_instruction'])
            ->make(true);
    }
    public function rejected(Request $request)
    {
        $dataRejected = [
            [
                'quote_number' => 'QN-14052022-0001',
                'quote_type' => 'Custom Only',
                'quote_date' => '13/05/2022 23:04',
                'type_of_trade' => 'Ex',
                'origin_country' => 'Indonesia',
                'origin_city' => 'Jakarta Utara',
                'destination_country' => 'Malaysia',
                'destination_city' => 'Kuala Lumpur',
                'shipping_instruction' => '38',
                'status' => 'Reject',
                'reason' => 'test'
            ],
        ];

        if (!$request->ajax()) {
            abort(403, 'Unauthorized access');
        }

        $rejecteds = Collection::make($dataRejected);

        // Filter berdasarkan type-of-quotation
        $typeOfQuotation = $request->input('type-of-quotation');
        if ($typeOfQuotation && $typeOfQuotation !== 'all') {
            $rejecteds = $rejecteds->filter(function ($item) use ($typeOfQuotation) {
                $quoteTypeMap = [
                    'full-container-load' => 'Full Container Load',
                    'less-container-load' => 'Less Container Load',
                    'non-container-shipment' => 'Non Container Shipment',
                    'air-freight-shipment' => 'Air Freight Shipment',
                    'charter-full-truck' => 'Charter Full Truck',
                    'less-truck-load' => 'Less Truck Load',
                    'custom-only' => 'Custom Only',
                ];
                $expectedQuoteType = $quoteTypeMap[$typeOfQuotation] ?? '';
                return $item['quote_type'] === $expectedQuoteType;
            });
        }

        return DataTables::of($rejecteds)
            ->addIndexColumn()
            ->addColumn('actions', function ($item) {

                return
                    '<a class="text-white rounded-sm bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-blue-500" href="/manage-shipment/pending/' . $item['quote_number'] . '">' .
                    '<i class="fa-solid fa-pen-to-square mr-1"></i> Edit' .
                    '</a> '
                ;

            })
            ->addColumn('status', function ($item) {
                if ($item['status']) {
                    return ' <span class="inline-block rounded-full bg-slate-300 px-2 py-1 text-center text-warnaBiruTua md:w-full">' .
                        '' . $item['status'] . ' <i class="ml-[2px] fa-solid fa-bars-staggered"></i>' .
                        '</span>';
                }
                return '';
            })
            ->addColumn('shipping_instruction', function ($item) {
                return '<a class="rounded-sm text-white bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-blue-500" href=" ' . $item['shipping_instruction'] . '">View</a>';
            })

            ->rawColumns(['actions', 'status', 'shipping_instruction'])
            ->make(true);
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
    public function show(ManageShipmentModel $manageShipmentModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ManageShipmentModel $manageShipmentModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ManageShipmentModel $manageShipmentModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ManageShipmentModel $manageShipmentModel)
    {
        //
    }
}
