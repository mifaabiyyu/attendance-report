<?php

namespace App\Http\Controllers;

use App\Models\Perizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class ManageIzinController extends Controller
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

        $izin = Perizinan::join('users', 'users.id', '=', 'perizinan.id_user')->get(['perizinan.*', 'users.*']);

        return view('manageizin', compact('izin'));
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
        //
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
        $edit = Perizinan::find($id);

        $izin = [
            'status'      => 2,
        ];

        $edit->update($izin);
        Alert::success('Success', 'Data Izin Telah Berhasil Diupdate !');
        return redirect()->back();
    }

    public function tolak(Request $request, $id)
    {
        $edit = Perizinan::find($id);

        $izin = [
            'status'      => 10,
        ];

        $edit->update($izin);
        Alert::success('Success', 'Data Izin Telah Berhasil Diupdate !');
        return redirect()->back();
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
