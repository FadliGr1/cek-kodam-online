<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show($name)
    {
        // Membaca file XML
        $path = Storage::path('ciriCiriOrang.xml');
        $xml = simplexml_load_file($path);
        $ciriList = [];
        foreach ($xml->Ciri as $ciri) {
            $ciriList[] = (string) $ciri;
        }

        // Mengambil satu ciri secara acak
        $randomCiri = $ciriList[array_rand($ciriList)];

        return view('profile', ['name' => $name, 'ciri' => $randomCiri]);
    }
}
