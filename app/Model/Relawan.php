<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Relawan extends Model {
    public $timestamps = false;
    protected $table = 'relawan';

    public function create() {
        return DB::insert("
            INSERT INTO relawan (
                email,
                no_hp,
                tanggal_lahir
            ) VALUES (
                ?, ?, ?
            )
        ", [
            $this->email,
            $this->noHp,
            $this->tanggalLahir
        ]);
    }
}
