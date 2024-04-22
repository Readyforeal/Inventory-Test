<div>
    <x-input wire:model.live="search" />

    @foreach ($clients as $client)
        <div class="mt-2">
            <a href="/client/{{ $client->id }}" class="font-semibold">{{ $client->name }}</a>
            <p class="text-xs">{{ $client->documents->count() > 1 ? $client->documents->count() . " Documents" : $client->documents->count() . " Document" }}</p>
            
            @livewire('documents-form', ['client' => $client], key($client->id))
        </div>

    @endforeach

</div>
