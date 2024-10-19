<?php

namespace App\Http\Controllers\operator;

use App\Http\Controllers\Controller;
use App\Models\Pemakaian_Air;
use App\Models\Warga;
use Carbon\Carbon;
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

    public function edit($warga_id){
        $warga = Warga::findOrFail($warga_id);

        $pemakaianAir = Pemakaian_Air::where('warga_id', $warga_id)->first();

        if (!$pemakaianAir) {
            $pemakaianAir = new Pemakaian_Air(); // atau bisa juga set nilai default lainnya
        }

        $bulan = [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December',
        ];

        $tahun = range(date('Y'), date('Y') - 5); // Tahun 5 tahun terakhir



        return view('operator.edit', compact(['warga', 'bulan', 'tahun', 'pemakaianAir']));
    }

    public function update(Request $request, $warga_id)
    {
        $pemakaianAir = Pemakaian_Air::where('warga_id', $warga_id)->first();

        $request->validate([
            'pemakaianBaru' => 'required|numeric',
            'pemakaianLama' => 'required|numeric',
            'fotoMeteran' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi file foto
        ]);

        // Proses upload foto jika ada
        $fotoPath = $pemakaianAir->foto;
        if ($request->hasFile('fotoMeteran')) {
            $file = $request->file('fotoMeteran');
            $fotoPath = $file->store('fotoMeteran', 'public'); // Simpan di storage
        }

        // Update data di pemakaian_air
        Pemakaian_Air::updateOrCreate(
            ['warga_id' => $warga_id], // Jika sudah ada warga_id, perbarui
            [
                'operator_id' => 1,
                'bulan' => $request->input('tahun') . '-' . str_pad($request->input('bulan'), 2, '0', STR_PAD_LEFT), // Format YYYY-MM
                'pemakaianLama' => $request->input('pemakaianLama'),
                'pemakaianBaru' => $request->input('pemakaianBaru'),
                'foto' => $fotoPath,
            ]
        );

        return redirect()->route('operator.index')->with('success', 'Data pemakaian berhasil diperbarui.');
    }

}
