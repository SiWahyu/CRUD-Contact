<?php

namespace App\Http\Controllers;

use App\Models\pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class kontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        if(strlen($katakunci)){
            $data = pesan::where('name', 'like', "%$katakunci%")
                        ->orWhere('email', 'like', "%$katakunci%");
        } else {
            $data = pesan::all();
        }
        return view('kontak.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kontak.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        Session::flash('pesan', $request->pesan);
        $request->validate([
            'name' => 'required:pesan:name',
            'email'=> 'required|email',
            'pesan' => 'required'
        ],[
            'name.required' => 'Nama harus di isi',
            'email.required' => 'Email harus benar',
            'pesan.required' => 'Pesan tidak boleh kosong'
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'pesan' => $request->pesan
        ];

        pesan::create($data);

        return redirect()->to('pesan')->with('success','Berhasil menambah data');
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
        $data = pesan::where('id', $id)->first();

        return view('kontak.edit')->with('data',$data);
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
        $request->validate([
            'name' => 'required:pesan:name',
            'email'=> 'required|email',
            'pesan' => 'required'
        ],[
            'name.required' => 'Nama harus di isi',
            'email.required' => 'Email harus benar',
            'pesan.required' => 'Pesan tidak boleh kosong'
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'pesan' => $request->pesan
        ];

        pesan::where('id',$id)->update($data);

        return redirect()->to('pesan')->with('success','Berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pesan::where('id', $id)->delete();
        return redirect()->to('pesan')->with('success', 'Berhasil menghapus data');
    }
}
