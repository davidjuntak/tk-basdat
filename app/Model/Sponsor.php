<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sponsor extends Model {
    public $timestamps = false;
    protected $table = 'sponsor';

    public function create() {
        return DB::insert("
            INSERT INTO sponsor (
                email,
                logo_sponsor
            ) VALUES (
                ?, ?
            )
        ", [
            $this->email,
            $this->logoSponsor
        ]);
    }

    public function selectByEmail(User $user) {
        $sponsor = DB::select("select * from sponsor where email = ?", [$user->email]);

        return $sponsor;
    }
}
