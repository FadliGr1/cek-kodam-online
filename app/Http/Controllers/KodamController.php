<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kodam;
use Illuminate\Support\Facades\Storage;

class KodamController extends Controller
{
    public function index()
    {
        $kodams = Kodam::orderBy('created_at', 'desc')->get();
        return view('kodam.index', compact('kodams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $xml = simplexml_load_file(Storage::path('kodamList.xml'));
        $kodamList = [];
        foreach ($xml->Kodam as $kodam) {
            $kodamList[] = (string) $kodam;
        }

        $randomKodam = $kodamList[array_rand($kodamList)];

        $kodam = new Kodam();
        $kodam->name = $request->name;
        $kodam->kodam = $randomKodam;
        $kodam->save();

        return redirect()->back()->with('status', "Hallo, selamat kamu mendapatkan $randomKodam");
    }

    public function show($name)
    {
        return view('kodam.show', compact('name'));
    }
}
