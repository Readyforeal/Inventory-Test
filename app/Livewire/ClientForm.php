<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ClientForm extends Component
{
    public $creatingClient = false;

    #[Validate('required')]
    public $type = "";

    #[Validate('required')]
    public $name = "";

    public $phones = [];
    public $addresses = [];

    public function render()
    {
        return view('livewire.client-form');
    }

    public function createClient() {
        $this->resetErrorBag();
        
        $this->type = "";
        $this->name = "";
        $this->phones = [];
        $this->addresses = [];

        $this->creatingClient = true;
    }

    public function addPhone() {
        $this->phones[] = [
            'type' => '',
            'phone' => '',
        ];
    }

    public function removePhone($index) {
        unset($this->phones[$index]);
    }

    public function addAddress() {
        $this->addresses[] = [
            'type' => '',
            'street' => '',
            'unit' => '',
            'city' => '',
            'state' => '',
            'zip' => '',
        ];
    }

    public function removeAddress($index) {
        unset($this->addresses[$index]);
    }

    public function store() {
        $this->validate();

        $newClient = Client::create([
            'type' => $this->type,
            'name' => $this->name,
        ]);

        foreach($this->phones as $phone) {
            $newClient->phones()->create($phone);
        }

        foreach($this->addresses as $address) {
            $newClient->addresses()->create($address);
        }

        $this->creatingClient = false;

        $this->dispatch('created-client');
    }
}
