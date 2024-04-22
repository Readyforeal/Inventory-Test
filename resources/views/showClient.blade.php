<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Client') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="m-3">
                    <p class="text-xl font-semibold">{{ $client->name }}</p>
                    <p class="text-xs text-gray-400">{{ $client->type }}</p>

                    <div class="mt-3">
                        <p class="font-semibold">Documents</p>

                        @livewire('documents-form', ['client' => $client])

                        @livewire('documents-list', ['client' => $client])

                    </div>

                    <div class="mt-3">
                        <p class="font-semibold">Phones</p>
                        @forelse ($client->phones as $phone)
                            <p class="text-xs">{{ $phone->type }}</p>
                            <p>{{ $phone->phone }}</p>
                        @empty
                            <p>No phones</p>
                        @endforelse
                    </div>

                    <div class="mt-3">
                        <p class="font-semibold">Addresses</p>
                        @forelse ($client->addresses as $address)
                            <p class="text-xs">{{ $address->type }}</p>
                            <p>{{ $address->street }} {{ isset($address->unit) ? 'Unit ' . $address->unit : ''}}</p>
                            <p>{{ $address->city }}, {{ $address->state }} {{ $address->zip }}</p>
                        @empty
                            <p>No addresses</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>