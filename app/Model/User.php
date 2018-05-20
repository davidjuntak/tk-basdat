<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model {
    public $timestamps = false;
    protected $table = 'user';

    public function create() {
        return DB::insert("
            INSERT INTO user (
                email,
                password,
                nama,
                provinsi,
                kabupaten,
                kecamatan,
                kode_pos,
                jalan
            ) VALUES (
                ?, ?, ?, ?, ?, ?, ?, ?
            )
        ", [
            $this->email,
            $this->password,
            $this->nama,
            $this->provinsi,
            $this->kabupaten,
            $this->kecamatan,
            $this->kodePos,
            $this->jalan
        ]);
    }

    public function selectByEmail() {
        $user = DB::select("select * from user where email = ?", [$this->email]);

        return $user;
    }

    public function selectForLogin() {
        $user = DB::select("select * from user where email = ? and password = ?", [$this->email, $this->password]);

        return $user;
    }
}