<div
    class="flex max-h-[68vh] w-full flex-col gap-2 overflow-y-auto px-3 text-[.65rem] font-medium text-stone-700 bp360:max-h-[72vh] bp360:text-[.7rem] bp400:max-h-[73vh] bp400:text-xs bp575:text-sm lg:max-h-[74vh] xl:max-h-[75vh]"
>
    <div>
        <p>{{ $subjects['subject'] }}</p>
        <p>
            created at : {{ $subjects['created_at'] }}
            <span>
                attachment:

                @if ($subjects['attachment'])
                    <a
                        class="text-blue-700 transition-all duration-300 ease-in-out hover:text-blue-500 hover:underline"
                        href="{{ $subjects['attachment'] }}"
                    >
                        Attachment
                    </a>
                @else
                    <span>No Attachment</span>
                @endif
            </span>
        </p>
    </div>
    <hr class="border-t-[1.5px] text-stone-400" />

    @if ($adminReply)
        <ul class="ml-7 list-disc">
            <li class="font-semibold text-stone-800">Gateway (Administrator)</li>
            <p class="mb-1">{{ $adminReply }}</p>
            <p>at {{ $replyTime }}</p>
        </ul>
    @else
        <ul class="ml-7 list-disc">
            <li>No answer for ticket "Please Cancel Quotation"</li>
        </ul>
    @endif

    <hr class="border-t-[1.5px] text-stone-400" />
    <form action="" method="POST" class="my-2 flex w-full flex-col items-start gap-3 md:w-1/2 md:flex-row">
        @csrf
        <textarea
            name="reply"
            id="reply"
            cols="60"
            rows="6"
            class="shadow-input w-full rounded-xs p-[6px] outline-2 outline-transparent transition-all duration-300 ease-in-out focus:outline-warnaBiruTua"
        ></textarea>
        <button
            type="submit"
            class="cursor-pointer rounded-sm bg-warnaBiruTua px-2 py-1 text-white transition-all duration-300 ease-in-out hover:bg-blue-500"
        >
            Reply
        </button>
    </form>
</div>
