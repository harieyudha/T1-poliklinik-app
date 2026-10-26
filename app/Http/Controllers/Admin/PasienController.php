<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = User::where('role', 'pasien')->get();

        return view('admin.pasien.index', compact('pasiens'));
    }
}