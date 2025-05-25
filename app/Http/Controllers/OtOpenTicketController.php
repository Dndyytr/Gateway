<?php

namespace App\Http\Controllers;

use App\Models\OtOpenTicketModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;
use Carbon\Carbon;


class OtOpenTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getData()
    {
        return [
            [
                'slug' => 'slug-1',
                'quote_no' => '',
                'subject' => 'Please Cancel Quotation',
                'user_email' => 'FMS Testing - fms-testing@gmail.com',
                'message' => 'ABCD',
                'department' => 'Operational',
                'attachment' => '/contoh.pdf',
                'created_at' => '22/04/2022 02:10'
            ],
            [
                'slug' => 'slug-2',
                'quote_no' => '',
                'subject' => 'PEB CENTEX',
                'user_email' => 'FMS Testing - fms-testing@gmail.com',
                'message' => 'Document PEB dmn?',
                'department' => 'Operational',
                'attachment' => '',
                'created_at' => '19/04/2022 04:33'
            ],
        ];
    }

    public function getOpenTicket(Request $request)
    {
        if (!$request->ajax()) {
            abort(403, 'Unauthorized access'); // Kembalikan error 403 jika bukan AJAX
        }

        $openTickets = Collection::make($this->getData());

        // Tambahkan nomor urut berdasarkan urutan awal data
        $openTickets = $openTickets->values()->map(function ($item, $index) {
            $item['no'] = $index + 1; // Nomor urut dimulai dari 1
            return $item;
        });

        // Tangkap parameter sorting dari DataTables
        $orderColumnIndex = $request->input('order.0.column', 0);
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columnName = $request->input("columns.{$orderColumnIndex}.name");

        // Urutkan data berdasarkan kolom yang dipilih
        if ($columnName && in_array($columnName, array_keys($this->getData()[0]))) {
            $openTickets = $openTickets->sortBy($columnName, SORT_REGULAR, $orderDirection === 'desc');
        }

        // Pastikan nomor urut diperbarui setelah sorting
        $openTickets = $openTickets->values()->map(function ($item, $index) {
            $item['no'] = $index + 1;
            return $item;
        });

        return DataTables::of($openTickets)
            ->addIndexColumn()
            ->addColumn('actions', function ($item) {
                return '<span class="flex flex-wrap gap-1 text-white md:justify-center">' .
                    ' <a class="rounded-sm bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-warnaBiruHover"
                href="/ot-open-ticket/reply/' . $item['subject'] . '">' .
                    ' <i class="fa-solid fa-pen-to-square mr-1"></i>
                Reply </a>' .
                    '<button
                class="cursor-pointer rounded-sm bg-warnaMerahTombol px-2 py-1 transition-all duration-300 ease-in-out hover:bg-red-300"
               x-on:click="openDeleteModal(\'/dm-open-ticket/' . $item['slug'] . '\')">' .

                    '<i class="fa-solid fa-trash-can mr-1"></i> Delete' .
                    '</button>' .
                    '</span>';
                ;
            })
            ->addColumn('attachment', function ($item) {
                if ($item['attachment']) {
                    return '<a href="' . $item['attachment'] . '" target="_blank" class="text-white rounded-sm bg-warnaBiruTua px-2 py-1 transition-all duration-300 ease-in-out hover:bg-warnaBiruHover"">View</a>';
                }
                return 'No Attachment';
            })

            ->rawColumns(['actions', 'attachment'])
            ->make(true);

    }

    public function index(request $request)
    {
        $openTickets = $this->getData();

        $titleMain = 'List Open Ticket';
        return view('OpenTicket.ot-open-ticket', compact('titleMain', 'openTickets'));
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
    public function show(OtOpenTicketModel $otOpenTicketModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OtOpenTicketModel $otOpenTicketModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OtOpenTicketModel $otOpenTicketModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OtOpenTicketModel $otOpenTicketModel)
    {
        //
    }

    public function reply(Request $request, $subject)
    {
        $subject = urldecode($subject); // decode subject yang dikirim via URL
        $openTickets = $this->getData();

        $subjects = Collection::make($openTickets)->firstWhere('subject', $subject);

        if (!$subjects) {
            abort(404, 'Subject not found');
        }


        // Simulasi balasan admin jika form dikirim
        $adminReply = null;
        $replyTime = null;
        if ($request->isMethod('post')) {
            $adminReply = $request->input('reply');

            $replyTime = Carbon::now()->format('d/m/Y H:i');

            // Simpan ke session
            return redirect()->route('ot-open-ticket.reply', ['subject' => $subject])
                ->with([
                    'adminReply' => $adminReply,
                    'replyTime' => $replyTime,
                    'success' => 'Saved',
                ]);
        }

        // Ambil dari session (jika ada)
        $adminReply = session('adminReply');
        $replyTime = session('replyTime');

        $titleMain = 'Your Subject: ' . $subjects['subject'];
        return view('OpenTicket.ot-open-ticket', compact('titleMain', 'subjects', 'adminReply', 'replyTime'));
    }
}
