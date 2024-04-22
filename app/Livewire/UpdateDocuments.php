<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;

class UpdateDocuments extends Component
{
    public $documents;

    #[Validate('required')]
    public $year;

    #[Validate('required')]
    public $type;

    #[Validate('required')]
    public $status;

    public $notes;

    public $updatingDocuments = false;
    public $deletingDocuments = false;

    public function render()
    {
        return view('livewire.update-documents');
    }

    public function updateDocuments() {
        $this->resetErrorBag();

        $this->year = $this->documents->year;
        $this->type = $this->documents->type;
        $this->status = $this->documents->status;
        $this->notes = $this->documents->notes;

        $this->updatingDocuments = true;
    }

    public function deleteDocuments() {
        $this->resetErrorBag();
        $this->deletingDocuments = true;
    }

    public function update() {
        $this->validate();

        $this->documents->update([
            'year' => $this->year,
            'type' => $this->type,
            'status' => $this->status,
            'notes' => $this->notes,
        ]);

        $this->dispatch('updated-documents');
        $this->updatingDocuments = false;
    }

    public function delete() {
        $this->documents->delete();
        $this->dispatch('deleted-documents');
        $this->deletingDocuments = false;
    }
}
