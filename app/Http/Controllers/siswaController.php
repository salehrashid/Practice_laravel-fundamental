<?php

namespace App\Http\Controllers;

use App\Http\Requests\siswaValidate;
use App\Models\jenisKelamin;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Siswas;
use Illuminate\Validation\ValidationException;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        /** fungsi query builder **/
        $siswas = Siswas::get();
        $genders = jenisKelamin::get();

        /** fungsi orm eloquent **/
        //$siswas2 = Siswas::all();
        //$siswas3 = DB::select("SELECT * FROM siswas");

        return view("siswa", compact("siswas", "genders"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        /** validasi untuk protection backend **/
        $this->validate($request,
            [
                "id_jenkel" => "required|integer",
                "nama" => "required|max:255",
                "tgl_lahir" => "required|date",
                "nik" => "required|min:10|max:11",
                "jurusan" => "required|max:3",
                "alamat" => "required|string|max:255",
                "angkatan" => "required|digits:2",
            ],
            /** untuk custom pesan error nya **/
            [
                //"nama.required" => "isi namanya cuy"
            ]

        );

        /** metode eloquent(tidak memakai query) **/
        $students = new Siswas();

        //database             //html
        $students->id_jenkel = $request->id_jenkel;
        $students->nama = $request->nama;
        $students->tgl_lahir = $request->tgl_lahir;
        $students->nik = $request->nik;
        $students->jurusan = $request->jurusan;
        $students->angkatan = $request->angkatan;
        $students->alamat = $request->alamat;

        /** untuk save hasil request dari kita **/
        $students->save();

        if ($students) {
            return redirect()->route("siswa")->with([
                "berhasil" => "berhasil create data"
            ]);
        } else {
            return redirect("/siswa")->with(["gagal" => "bermasalah"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
