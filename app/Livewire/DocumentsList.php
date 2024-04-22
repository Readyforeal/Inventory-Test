<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class DocumentsList extends Component
{
    public $client;

    #[On('created-documents')]
    #[On('deleted-documents')]
    public function render()
    {
        return view('livewire.documents-list', ['client' => $this->client]);
    }
}
