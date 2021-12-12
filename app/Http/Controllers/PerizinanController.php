<?php

namespace App\Http\Controllers;

use App\Models\Perizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use Illuminate\Support\Carbon;

class PerizinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $izin = Perizinan::where('id_user', Auth::user()->id)->get();
        return view('perizinan', compact('izin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required',
            'datestart' => 'required',
        ]);

        $h1     = Carbon::now()->addDays(1);
        $now    = Carbon::now();

        $h3     = Carbon::now()->subDays(4);

        $inputdate = $request->datestart;

        if ($request->jenis == 'izin') {
            if ($h1 <= $inputdate && $inputdate > $now) {
                $perizinan = new Perizinan;
                $perizinan ->id_user    = Auth::user()->id;
                $perizinan->jenis       = $request->jenis;
                $perizinan->datestart   = $request->datestart;
                $perizinan->deskripsi   = $request->deskripsi;
        
                $perizinan->save();
                Alert::success('Success', 'Data Izin Telah Berhasil Diajukan !');
                return redirect()->back();
            }
                Alert::warning('Warning', 'Anda Izin Terlalu Mendadak !');
                return redirect()->back();
        }else {
            if ($h3 < $inputdate && $inputdate < $now) {
                $perizinan = new Perizinan;
                $perizinan ->id_user    = Auth::user()->id;
                $perizinan->jenis       = $request->jenis;
                $perizinan->datestart   = $request->datestart;
                $perizinan->deskripsi   = $request->deskripsi;
        
                $perizinan->save();
                Alert::success('Success', 'Data Izin Telah Berhasil Diajukan !');
                return redirect()->back();
            }
                Alert::warning('Warning', 'Anda Izin Tidak Sesuai Ketentuan !');
                return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
