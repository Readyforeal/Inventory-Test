<div>
    <p class="text-xs font-semibold cursor-pointer" wire:click="addDocuments({{ $client->id }})">Add Documents</p>

    <x-dialog-modal wire:model.live="addingDocuments">
        <x-slot name="title">
            Add Documents
        </x-slot>

        <x-slot name="content">
            <div class="flex gap-2 mt-2">
                <div class="w-1/2">
                    <x-label for="year" value="{{ __('Year') }}" />
                    <x-input type="number" class="mt-1 w-full" id="year" wire:model="year" />
                    <x-input-error for="year" class="mt-2" />
                </div>
    
                <div class="w-1/2">
                    <x-label for="type" value="{{ __('Type')}}" />
                    <x-select class="mt-1 w-full" id="type" wire:model="type" >
                        <option value="" selected disabled></option>
                        <option value="Tax">Tax</option>
                        <option value="Bookkeeping">Bookkeeping</option>
                        <option value="Additional">Additional</option>
                    </x-select>
                    <x-input-error for="type" class="mt-2" />
                </div>
            </div>

            <div class="mt-2">
                <x-label for="status" value="{{ __('Status')}}" />
                <x-select class="w-full mt-1" id="status" wire:model="status" >
                    <option value="" selected disabled></option>
                    <option value="Received">Received</option>
                    <option value="Stored">Stored</option>
                    <option value="Delivered">Delivered</option>
                </x-select>
                <x-input-error for="status" class="mt-2" />
            </div>

            <div class="mt-2">
                <x-label for="notes" value="{{ __('Notes') }}" />
                <x-input class="mt-1 w-full" id="notes" wire:model="notes" />
                <x-input-error for="notes" class="mt-2" />
            </div>

            {{-- <x-button class="my-2" onclick="GenerateBarcode({{ $client->id }}, '{{ $client->name }}')">Generate Barcode</x-button>

            <img id="barcode" /> --}}

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('addingDocuments', false)" class="mr-2">Cancel</x-secondary-button>
            <x-button wire:click="store">Add</x-button>
        </x-slot>
    </x-dialog-modal>
    
    {{-- <script>
        function GenerateBarcode(clientId, clientName) {
            JsBarcode("#barcode", "12345678", {height: 20, text: clientName});
        }
    </script> --}}
</div>