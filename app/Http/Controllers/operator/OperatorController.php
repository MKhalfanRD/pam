<?php

namespace App\Http\Controllers\operator;

use App\Http\Controllers\Controller;
use App\Models\Warga;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index(){
        //
        // return view('operator.index', compact(['warga']));
        $role = 'operator'; // atau 'warga' atau 'admin'
        $warga = Warga::all();
        return view('operator.index', compact('role', 'warga'));
    }

    public function edit(){

    }
}
