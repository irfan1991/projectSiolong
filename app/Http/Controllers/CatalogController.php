<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Http\Requests;
use App\Kategori;
use App\User;
use Auth;
use Validator;
class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

        {


            $user = User::orderBy('id','desc');
 $q = $request->get('q');
            if(Auth::check()){
       
      
            if ($request->has('cat')) {
            $cat = $request->get('cat');
            $kategori = Kategori::findOrFail($cat);

                        // we use this to get product from current category and its child
            $barangs = Barang::whereIn('id', $kategori->related_products_id)
                ->where('nama_barang', 'LIKE', '%'.$q.'%')->where('id_user' ,'!=',Auth::user()->id);
        } else {
            $barangs = Barang::where('nama_barang', 'LIKE', '%'.$q.'%')->where('id_user' ,'!=',Auth::user()->id);
        }

        if ($request->has('sort')) {
            $sort = $request->get('sort');
            $order = $request->has('order') ? $request->get('order') : 'asc';
            $field = in_array($sort, ['price', 'name']) ? $request->get('sort') : 'price';
            $barangs = $barangs->orderBy($field, $order);
        }}
        else{

            $barangs = Barang::where('nama_barang', 'LIKE', '%'.$q.'%');
        }

        $barangs = $barangs->paginate(4);

        return view('katalog.index', compact('barangs', 'q', 'c','cat','kategori','sort','order','user'));
    if(!$request->get('q')){

            return view('katalog.listkosong', compact('barangs', 'q', 'c','cat','kategori','sort','order','user'));

    }

    }




public function search(Request $request)

        {

 $q = $request->get('q');
      
if($q){
            $user = User::orderBy('id','desc');
       
            if ($request->has('cat')) {
            $cat = $request->get('cat');
            $kategori = Kategori::findOrFail($cat);

                        // we use this to get product from current category and its child
            $barangs = Barang::whereIn('id', $kategori->related_products_id)
                ->where('nama_barang', 'LIKE', '%'.$q.'%');
        } else {
            $barangs = Barang::where('nama_barang', 'LIKE', '%'.$q.'%');
        }

        if ($request->has('sort')) {
            $sort = $request->get('sort');
            $order = $request->has('order') ? $request->get('order') : 'asc';
            $field = in_array($sort, ['price', 'name']) ? $request->get('sort') : 'price';
            $barangs = $barangs->orderBy($field, $order);
        }

        $barangs = $barangs->paginate(4);

        return view('katalog.index', compact('barangs', 'q', 'c','cat','kategori','sort','order','user'));
    }else{
            return view('katalog.listkosong', compact('barangs', 'q', 'c','cat','kategori','sort','order','user'));

    }

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
