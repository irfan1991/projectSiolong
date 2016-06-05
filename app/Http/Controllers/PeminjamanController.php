<?php

namespace App\Http\Controllers;
use App\Peminjam;
use App\Barang;
use App\User;
use Illuminate\Http\Request;
use view;
use App\Http\Requests;
use Input;
use Auth;
use App\Role;
use Redirect;
use Session;

class PeminjamanController extends Controller
{
    /**all
     * Display a listing of the resource.
     *
     * @return \Illuminate\Htt99p\Response
     */
    public function index()
    {
         

      $member = \DB::table('borrow_logs')
                   ->join('barangs','barangs.id','=','borrow_logs.barang_id')
                   ->join('users','users.id','=','borrow_logs.user_id')
                   //->where('barangs.id','=','users.id')
                   ->paginate(2);
                   

        return view('admin.peminjaman.index', compact('member','barang'));
    }
public function search(Request $request)
    {

        if($request->get('keyword')){

        $keyword = $request['keyword'];
               
        $member = User::where('name', 'LIKE', '%'.$keyword.'%')
        ->where('username', '<>', 'admin')
                     ->orderBy('id','desc')
                     ->paginate(6);
               return view('admin.peminjaman.index',compact('member'));}
               else{
                 return view('admin.peminjaman.listko');
               }
    }

    public function returnBack($barang_id)
    {
        $borrowLog = Peminjam::where('barang_id', $barang_id)
            ->where('is_returned', 0)
            ->first();

        if ($borrowLog) {
            $borrowLog->is_returned = true;
            $borrowLog->save();

            Session::flash("flash_notification", [
                "level"=>"success",
                "message"=>"Berhasil mengembalikan " . $borrowLog->barang->nama_barang
            ]);
        }

        return redirect('listuser');
    }

public function returnAh($barang_id)
    {
        $borrowLog = Peminjam::where('nama_barang', $barang_id)
            ->where('is_returned', 0)
            ->first();

        if ($borrowLog) {
            $borrowLog->is_returned = true;
            $borrowLog->save();

            Session::flash("flash_notification", [
                "level"=>"success",
                "message"=>"Berhasil mengembalikan " . $borrowLog->barang->nama_barang
            ]);
        }

        return redirect('admin.peminjaman.index');
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
        $member = User::find($id);
        return view('admin.peminjaman.show', compact('member'));
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
