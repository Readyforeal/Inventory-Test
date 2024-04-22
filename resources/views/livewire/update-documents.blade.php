<div>
    <div class="inline-flex gap-2">
        <a class="inline-flex" href="/documents/{{ $documents->id }}" target="_blank">
            <i class="fa fa-fw fa-print opacity-50 hover:opacity-100 transition ease-in-out hover:cursor-pointer"></i>
        </a>
        <i class="fa fa-fw fa-pen opacity-50 hover:opacity-100 transition ease-in-out hover:cursor-pointer" wire:click="updateDocuments"></i>
        <i class="fa fa-fw fa-trash opacity-50 hover:opacity-100 transition ease-in-out hover:cursor-pointer" wire:click="deleteDocuments"></i>
    </div>

    <x-dialog-modal wire:model.live="updatingDocuments">
        <x-slot name="title">
            Updating Documents
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
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-2" wire:click="$set('updatingDocuments', false)">Cancel</x-secondary-button>
            <x-button wire:click="update">Save</x-button>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model.live="deletingDocuments">
        <x-slot name="title">
            Delete Documents
        </x-slot>

        <x-slot name="content">
            This action cannot be undone. Are you sure?
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-2" wire:click="$set('deletingDocuments', false)">Cancel</x-secondary-button>
            <x-button wire:click="delete">Delete</x-button>
        </x-slot>
    </x-dialog-modal>
</div>