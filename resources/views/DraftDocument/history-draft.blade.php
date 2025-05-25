<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Gateway</title>

        {{-- fonts awesome icons --}}
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
            integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />

        {{-- Vite --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <style>
        html,
        body {
            background-color: #eaeff7;
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>

    <body>
        <main class="px-3 py-10 bp360:px-5 md:px-10">
            <div class="shadow-card w-full max-w-full rounded-sm bg-white p-5">
                <div>
                    <h1
                        class="relative z-9 w-full rounded-tl-sm rounded-tr-sm bg-warnaBiruTua p-3 text-sm font-semibold text-warnaKuning md:text-base xl:text-lg 2xl:text-xl"
                    >
                        Draft Document History
                    </h1>
                </div>
                <div class="w-full overflow-auto">
                    <table class="mb-3 w-full table-auto text-left whitespace-nowrap">
                        <thead class="text-xs text-stone-700 bp575:text-sm xl:text-base 2xl:text-lg">
                            <tr class="border-b-[1.5px] border-stone-300">
                                <th class="px-3 py-2 font-semibold">No</th>
                                <th class="px-3 py-2 font-semibold">User</th>
                                <th class="px-3 py-2 font-semibold">Doc Status</th>
                                <th class="px-3 py-2 font-semibold">Draft Type</th>
                                <th class="px-3 py-2 font-semibold">File</th>
                                <th class="px-3 py-2 font-semibold">Remark</th>
                                <th class="px-3 py-2 font-semibold">File Upload at</th>
                                <th class="px-3 py-2 font-semibold">Created at</th>
                            </tr>
                        </thead>
                        <tbody class="text-xs text-stone-700 bp575:text-sm xl:text-base 2xl:text-lg">
                            <tr class="border-b-[1.5px] border-stone-300">
                                <td class="px-3 py-2 font-medium">1</td>
                                <td class="px-3 py-2 font-medium">Gateway (Admin)</td>
                                <td class="px-3 py-2 font-medium">New</td>
                                <td class="truncate px-3 py-2 font-medium">
                                    Partial payment (sebagian diawal sebagian diakhir)
                                </td>
                                <td class="px-3 py-2 font-medium">
                                    <a
                                        class="text-blue-600 transition-all duration-300 ease-in-out hover:text-blue-400"
                                        href=""
                                    >
                                        Open File
                                    </a>
                                </td>
                                <td class="px-3 py-2 font-medium">-</td>
                                <td class="px-3 py-2 font-medium">2022-05-14T03:30:00</td>
                                <td class="px-3 py-2 font-medium">2022-05-14T03:30:00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </body>
</html>
