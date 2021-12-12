<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Models\User;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->roles != 'admin') {
            abort(403, 'Maaf !! Anda tidak diizinkan mengakses halaman ini !!');
        }

        $datalaporan = User::leftJoin('absensi', 'absensi.id_user', '=', 'users.id')->rightJoin('perizinan', 'perizinan.id_user', '=', 'users.id')->distinct()->get(['users.name', 'users.id', 'absensi.masuk', 'absensi.keluar', 'perizinan.jenis', 'perizinan.datestart', 'perizinan.status'])
        ->groupBy(function ($val) {
            return Carbon::parse($val->masuk)->format('m');
        });
        return view('laporan', compact('datalaporan'));
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
        $absen = Absensi::where('id_user', Auth::user()->id)->whereDay('masuk', Carbon::now()->day)->first();

        $startTime = Carbon::createFromFormat('H:i a', '09:00 AM');
        $endTime = Carbon::createFromFormat('H:i a', '05:00 PM');
  
        $check = Carbon::now()->between($startTime, $endTime, true);
        
        $kehadiran = new Absensi;
        if ($absen != null) {
            $update = [
                'status'      => 2,
                'keluar'  => Carbon::now(),
            ];
           $absen->update($update);
           if ($check) {
                Alert::warning('Warning', 'Anda Absen Keluar Terlalu Dini !');
                return redirect()->back();
           } else {
                Alert::success('Success', 'Telah Absen Keluar, Terima Kasih !');
                return redirect()->back();
           }
        } else {
            $kehadiran->status = 1;
            $kehadiran->id_user = Auth::user()->id;
            $kehadiran->masuk = Carbon::now();
            $kehadiran->save();
            if ($check) {
                Alert::warning('Warning', 'Anda Terlambat !!');
                return redirect()->back();
            } else {
                Alert::success('Success', 'Telah Absen Masuk, Terima Kasih !');
                return redirect()->back();
            }
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
