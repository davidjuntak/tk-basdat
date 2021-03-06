<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Donatur extends Model {
    public $timestamps = false;
    protected $table = 'donatur';

    public function create() {
        return DB::insert("
            INSERT INTO donatur (
                email,
                saldo
            ) VALUES (
                ?, ?
            )
        ", [
            $this->email,
            $this->saldo
        ]);
    }

    public function selectByEmail(User $user) {
        $donatur = DB::select("select * from donatur where email = ?", [$user->email]);

        return $donatur;
    }
}
