<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $warga = Warga::all();
        return response()->json($warga);
    }
}
