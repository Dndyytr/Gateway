<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;

class DraftDocumentController extends Controller
{
    public function index(Request $request)
    {
        $draftDocuments = [];

        return view('DraftDocument.draft-document', compact('draftDocuments'));

    }

    public function getDraftDocument(Request $request)
    {
        if (!$request->ajax()) {
            abort(403, 'Unauthorized access'); // Kembalikan error 403 jika bukan AJAX
        }

        $draftDocuments = [
            [
                'quote_type' => 'Less Container Load',
                'si_number' => 'BJJ3123432DW2222',
                'type_of_trade' => 'Ex',
                'shipment_number' => 'QN-27042022-0002',
                'shipment_date' => '27/04/2022 02:33',
                'quote_number' => 'QN-27042022-0002',
                'quote_date' => '27/04/2022 02:33',
                'download_draft' => '',

            ],
        ];

        $draftDocument = Collection::make($draftDocuments);

        return DataTables::of($draftDocument)
            ->addIndexColumn()

            ->addColumn('download_draft', function ($item) {
                if ($item['download_draft']) {
                    return '<a href="' . $item['download_draft'] . '">Download</a>';
                }
                return 'Not Uploaded';
            })
            ->addColumn('actions', function ($item) {
                return '<span class="flex flex-wrap gap-1 text-white">' .
                    '<button onclick="window.open(\'/draft-document/history/' . $item['quote_number'] . '\', \'_blank\', \'location=yes,height=570,width=520,scrollbars=yes,status=yes\')" class="rounded-xs cursor-pointer bg-warnaBiruTua p-1 transition-all duration-300 ease-in-out hover:bg-warnaBiruHover">History</button>' .
                    '<button x-on:click="openUploadDraft(\'/draft-document/upload-draft/' . $item['quote_number'] . '\')" class="rounded-xs cursor-pointer bg-warnaBiruTua p-1 transition-all duration-300 ease-in-out hover:bg-warnaBiruHover">Upload Draft Document</button>' .
                    '</span>';
            })
            ->rawColumns(['download_draft', 'actions'])
            ->make(true);

    }

    public function historyDraft(Request $request)
    {
        return view('DraftDocument.history-draft');
    }

    // public function showUploadForm(Request $request)
    // {
    //     $draftDocuments = [
    //         [
    //             'quote_type' => 'Less Container Load',
    //             'si_number' => 'BJJ3123432DW2222',
    //             'type_of_trade' => 'Ex',
    //             'shipment_number' => 'QN-27042022-0002',
    //             'shipment_date' => '27/04/2022 02:33',
    //             'quote_number' => 'QN-27042022-0002',
    //             'quote_date' => '27/04/2022 02:33',
    //             'download_draft' => '',

    //         ],
    //     ];

    //     $quoteNumber = $request->query('quote_number');

    //     // Ubah view yang dikembalikan agar sesuai dengan struktur sebelumnya
    //     return view('DraftDocument.draft-document', compact('quoteNumber', 'draftDocuments'));
    // }

    public function uploadDraft(Request $request, $quoteNumber)
    {
        return redirect()->route('draft-document.index')->with('success', 'Data Uploaded Successful');
    }
}
