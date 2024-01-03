<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getName(Request $request)
    {
        // Ambil data pengguna dari request atau setel ke null jika tidak ada
        $user = $request->user();

        // Gunakan operator null coalescing untuk mendapatkan nama pengguna atau nilai default
        $name = $user->name ?? 'Default Name';

        // Tampilkan hasilnya
        return "User Name: $name";
    }
}
