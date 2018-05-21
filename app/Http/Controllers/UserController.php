<?php

namespace App\Http\Controllers;

use App\Model\Donatur;
use App\Model\KeahlianRelawan;
use App\Model\Relawan;
use App\Model\Sponsor;
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

        session([
            'user' => $user,
            'role' => $role
        ]);

        return \redirect()->route('profile');
    }

    public function submitLogin(Request $request) {
        $userService = new UserService();
        $user = new User();
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $loggedInUser = $userService->selectForLogin($user);

        if (count($loggedInUser) > 0) {
            $role = '';

            $relawan = new Relawan();
            if (count($relawan->selectByEmail($user)) > 0) {
                $role = 'relawan';
            }

            $donatur = new donatur();
            if (count($donatur->selectbyemail($user)) > 0) {
                $role = 'donatur';
            }

            $sponsor = new Sponsor();
            if (count($sponsor->selectbyemail($user)) > 0) {
                $role = 'sponsor';
            }

            session([
                'user' => $user,
                'role' => $role
            ]);
        } else {
            return \redirect()->route('login')->withErrors('Email atau password salah.');
        }

        return \redirect()->route('profile');
    }

    public function logout() {
        session()->forget('user');
        session()->forget('role');

        return \redirect()->route('login');
    }

    public function profile(Request $request) {
        $user = session('user');
        $role = session('role');
        $existingUser = $user->selectByEmail();

        switch ($role) {
            case 'donatur':
                $donatur = new donatur();
                $donatur = $donatur->selectbyemail($user);

                $user = (object) array_merge((array) $existingUser[0], (array) $donatur[0]);
                break;
            case 'sponsor':
                $sponsor = new Sponsor();
                $sponsor = $sponsor->selectByEmail($user);

                $user = (object) array_merge((array) $existingUser[0], (array) $sponsor[0]);
                break;
            default:
                $relawan = new Relawan();
                $relawan = $relawan->selectByEmail($user);

                $keahlianRelawan = new KeahlianRelawan();
                $keahlianRelawan = $keahlianRelawan->selectByEmail($user);

                $user = (object) array_merge((array) $existingUser[0], (array) $relawan[0], (array) $keahlianRelawan[0]);
                break;
        }

        return view('profile')->with('user', $user)->with('role', $role);
    }
}
