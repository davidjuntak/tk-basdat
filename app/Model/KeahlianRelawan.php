<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KeahlianRelawan extends Model {
    public $timestamps = false;
    protected $table = 'keahlian_relawan';

    public function create() {
        return DB::insert("
            INSERT INTO keahlian_relawan (
                email,
                keahlian
            ) VALUES (
                ?, ?
            )
        ", [
            $this->email,
            $this->keahlian
        ]);
    }

    public function selectByEmail(User $user) {
        $keahlianRelawan = DB::select("select * from keahlian_relawan where email = ?", [$user->email]);

        return $keahlianRelawan;
    }
}
