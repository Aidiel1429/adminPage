<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Navlink extends Controller
{
    public static function beranda() {
        return view('Toko.toko');
    }

    public static function produk() {
        return view('Toko.produk');
    }

    public static function tambah() {
        return view('Toko.tambah');
    }

}
