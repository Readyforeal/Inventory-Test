<div>
    <x-button wire:click="createClient">Create Client</x-button>

    <x-dialog-modal wire:model="creatingClient">
        <x-slot name="title">
            {{ __('Create Client') }}
        </x-slot>

        <x-slot name="content">
            <div class="mb-2">
                <x-label for="type" value="{{ __('Type')}}" />
                <x-select class="w-full mt-1" id="type" wire:model="type" >
                    <option value="" selected disabled>Select type..</option>
                    <option value="Individual">Individual</option>
                    <option value="Corporation">Corporation</option>
                </x-select>
                <x-input-error for="type" class="mt-2" />
            </div>

            <div class="mb-2">
                <x-label for="name" value="{{ __('Name')}}" />
                <x-input class="w-full mt-1" id="name" wire:model="name" />
                <x-input-error for="name" class="mt-2" />
            </div>

            <x-button wire:click="addPhone">Add Phone</x-button>

            @foreach ($phones as $phone)
            <div class="flex justify-between gap-2 w-full mt-2">
                <div class="flex gap-2">
                    <div>
                        <x-label for="phones-[{{ $loop->index }}]-type" value="{{ __('Type')}}" />
                        <x-select class="w-full mt-1" id="phones-[{{ $loop->index }}]-type" wire:model.live="phones.{{ $loop->index }}.type" >
                            <option value="" selected disabled>Select type..</option>
                            <option value="Personal">Personal</option>
                            <option value="Business">Business</option>
                            <option value="Spouse Personal">Spouse Personal</option>
                            <option value="Spouse Personal">Spouse Business</option>
                        </x-select>
                        <x-input-error for="phones-[{{ $loop->index }}]-type" class="mt-2" />
                    </div>
        
                    <div>
                        <x-label for="phones-[{{ $loop->index }}]-phone" value="{{ __('Phone Number')}}" />
                        <x-input class="w-full mt-1" id="phones-[{{ $loop->index }}]-phone" wire:model.live="phones.{{ $loop->index }}.phone" />
                        <x-input-error for="phones-[{{ $loop->index }}]-phone" class="mt-2" />
                    </div>
                </div>
    
                <div>
                    <x-secondary-button wire:click="removePhone({{ $loop->index }})">Delete</x-secondary-button>
                </div>
            </div>
            @endforeach

            <div class="mt-2">
                <x-button wire:click="addAddress">Add Address</x-button>
            </div>

            @foreach ($addresses as $key => $item)
            <div class="mt-2">
                <div>
                    <x-label for="addresses-[{{ $key }}]-type" value="{{ __('Type')}}" />
                    <x-select class="w-full mt-1" id="addresses-[{{ $key }}]-type" wire:model.live="addresses.{{ $key }}.type" >
                        <option value="" selected disabled>Select type..</option>
                        <option value="Personal">Personal</option>
                        <option value="Business">Business</option>
                    </x-select>
                    <x-input-error for="addresses-[{{ $key }}]-type" class="mt-2" />
                </div>
    
                <div class="mt-2">
                    <x-label for="addresses-[{{ $key }}]-street" value="{{ __('Street')}}" />
                    <x-input class="w-full mt-1" id="addresses-[{{ $key }}]-street" wire:model.live="addresses.{{ $key }}.street" />
                    <x-input-error for="addresses-[{{ $key }}]-street" class="mt-2" />
                </div>

                <div class="mt-2">
                    <x-label for="addresses-[{{ $key }}]-unit" value="{{ __('Unit')}}" />
                    <x-input class="w-full mt-1" id="addresses-[{{ $key }}]-unit" wire:model.live="addresses.{{ $key }}.unit" />
                    <x-input-error for="addresses-[{{ $key }}]-unit" class="mt-2" />
                </div>

                <div class="mt-2">
                    <x-label for="addresses-[{{ $key }}]-city" value="{{ __('City')}}" />
                    <x-input class="w-full mt-1" id="addresses-[{{ $key }}]-city" wire:model.live="addresses.{{ $key }}.city" />
                    <x-input-error for="addresses-[{{ $key }}]-city" class="mt-2" />
                </div>

                <div class="mt-2">
                    <x-label for="addresses-[{{ $key }}]-state" value="{{ __('State')}}" />
                    <x-input class="w-full mt-1" id="addresses-[{{ $key }}]-state" wire:model.live="addresses.{{ $key }}.state" />
                    <x-input-error for="addresses-[{{ $key }}]-state" class="mt-2" />
                </div>

                <div class="mt-2">
                    <x-label for="addresses-[{{ $key }}]-zip" value="{{ __('ZIP')}}" />
                    <x-input class="w-full mt-1" id="addresses-[{{ $key }}]-zip" wire:model.live="addresses.{{ $key }}.zip" />
                    <x-input-error for="addresses-[{{ $key }}]-zip" class="mt-2" />
                </div>
    
                <x-secondary-button class="mt-2" wire:click="removeAddress({{ $key }})">Delete</x-secondary-button>
            </div>
            @endforeach
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-2" wire:click="$set('creatingClient', false)">Cancel</x-secondary-button>
            <x-button wire:click="store">Create</x-button>
        </x-slot>
    </x-dialog-modal>
</div>
