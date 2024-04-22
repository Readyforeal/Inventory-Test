<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function phones() {
        return $this->hasMany(Phone::class);
    }

    public function addresses() {
        return $this->hasMany(Address::class);
    }

    public function documents() {
        return $this->hasMany(Documents::class);
    }
}
