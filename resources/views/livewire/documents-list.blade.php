<div>
    @forelse ($client->documents as $documents)
        <div class="flex justify-between mt-2 p-3 border rounded-xl hover:bg-gray-100 transition ease-in-out hover:cursor-default">
            <div class="flex">
                <i class="fa-regular fa-fw fa-folder text-1xl mt-2"></i>

                <div class="ml-3">
                    <p class="text-xs font-semibold leading-none">{{ $documents->status }}</p>
                    <p class="leading-tight">{{ $documents->year }} {{ $documents->type }}</p>
                </div>
            </div>

            <div class="mt-[3px]">

                <div class="flex">
                    {{-- <img class="mr-3" id="{{ $documents->barcode }}">

                    <script>
                        var element = document.getElementById("{{ $documents->barcode }}");
                        var barcode = "{{ $documents->barcode }}";
                        JsBarcode(element, barcode, {width: 1, height: 12, fontSize: 12, margin: 0});
                    </script> --}}

                    <p class="mr-3">{{ $documents->barcode }}</p>

                    @livewire('update-documents', ['documents' => $documents], key($documents->id))

                </div>
                {{-- <a href="/documents/{{ $documents->id }}"><i class="fa fa-fw fa-barcode"></i></a> --}}
            </div>
        </div>

    @empty
        <p>No documents</p>
    @endforelse
</div>
