<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Attributes\On;
use Livewire\Component;

class ClientList extends Component
{
    public $search = "";

    #[On('created-client')]
    #[On('created-documents')]
    public function render()
    {
        $clients = Client::search(['name', 'phones.phone', 'addresses.street', 'documents.barcode'], $this->search)->get();
        return view('livewire.client-list', ['clients' => $clients]);
    }
}
