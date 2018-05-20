<?php

namespace App\Service;

use App\Model\User;
use App\Model\Relawan;
use App\Model\KeahlianRelawan;
use App\Model\Donatur;
use App\Model\Sponsor;

class UserService
{
    public function createUser(User $user) {
        return $user->create();
    }

    public function createRelawan(User $user) {
        $userCreateStatus = $this->createUser($user);

        $relawan = new Relawan();
        $relawan->email = $user->email;
        $relawan->noHp = $user->noHp;
        $relawan->tanggalLahir = $user->tanggalLahir;
        $relawanCreateStatus = $relawan->create();

        $keahlianRelawan = new KeahlianRelawan();
        $keahlianRelawan->email = $user->email;
        $keahlianRelawan->keahlian = $user->keahlian;
        $keahlianRelawanCreateStatus = $keahlianRelawan->create();

        return ($userCreateStatus && $relawanCreateStatus && $keahlianRelawanCreateStatus);
    }

    public function createDonatur(User $user) {
        $userCreateStatus = $this->createUser($user);

        $donatur = new Donatur();
        $donatur->email = $user->email;
        $donatur->saldo = $user->saldo;
        $donaturCreateStatus = $donatur->create();

        return ($userCreateStatus && $donaturCreateStatus);
    }

    public function createSponsor(User $user) {
        $userCreateStatus = $this->createUser($user);

        $sponsor = new Sponsor();
        $sponsor->email = $user->email;
        $sponsor->logoSponsor = $user->logoSponsor;
        $sponsorCreateStatus = $sponsor->create();

        return ($userCreateStatus && $sponsorCreateStatus);
    }

    public function selectByEmail(User $user) {
        $existingUser = $user->selectByEmail();

        return $existingUser;
    }

    public function selectForLogin(User $user) {
        $existingUser = $user->selectForLogin();

        return $existingUser;
    }
}