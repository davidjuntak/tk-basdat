<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Service\UserService;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function submitRegister(Request $request) {
        $role = $request->input('role');
        $userService = new UserService();
        $user = new User();
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->nama = $request->input('nama');
        $user->provinsi = $request->input('provinsi');
        $user->kabupaten = $request->input('kabupaten');
        $user->kecamatan = $request->input('kecamatan');
        $user->kodePos = $request->input('kode_pos');
        $user->jalan = $request->input('jalan');

        $existingUser = $userService->selectByEmail($user);
        if (count($existingUser) > 0) {
            return \redirect()->back()->withErrors('Email sudah terdaftar');
        }

        switch ($role) {
            case 'donatur':
                $user->saldo = 0;

                $userService->createDonatur($user);
                break;
            case 'sponsor':
                $user->logoSponsor = 'logo';

                $userService->createSponsor($user);
                break;
            default:
                $user->tanggalLahir = $request->input('tanggal_lahir');
                $user->noHp = $request->input('no_hp');
                $user->keahlian = $request->input('keahlian');

                $userService->createRelawan($user);
                break;
        }

        return \redirect()->back()->with('success', 'Pendaftaran berhasil. Silahkan login terlebih dahulu.');
    }

    public function submitLogin(Request $request) {
        $userService = new UserService();
        $user = new User();
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $loggedInUser = $userService->selectForLogin($user);

        if (count($loggedInUser) > 0) {
            return "tape";
        }

        return "lontong";
    }
}