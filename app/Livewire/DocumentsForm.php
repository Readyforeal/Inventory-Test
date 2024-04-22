<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Str;

class DocumentsForm extends Component
{
    public $client;

    public $addingDocuments = false;

    #[Validate('required')]
    public $year = "";

    #[Validate('required')]
    public $type = "";

    #[Validate('required')]
    public $status = "";

    public $notes = "";

    public function render()
    {
        return view('livewire.documents-form');
    }

    public function addDocuments() {
        $this->resetErrorBag();
        $this->addingDocuments = true;
    }

    public function store() {
        $this->validate();

        $this->client->documents()->create([
            'barcode' => Str::random(8),
            'year' => $this->year,
            'type' => $this->type,
            'status' => $this->status,
            'notes' => $this->notes,
        ]);

        $this->addingDocuments = false;
        $this->dispatch('created-documents');
    }
}
