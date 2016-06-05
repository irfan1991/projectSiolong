<?php

namespace App\Http\Controllers;
use Input;
use Illuminate\Http\Request;
use App\Kategori;
use App\Http\Requests;
 use Redirect;
class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('role:admin');
    }




    public function index()
    {
        //
        $kategori = Kategori::orderBy('id','desc')->paginate(5);
        return view('admin.kategori.index', compact('kategori'));
    }

    public function search(Request $request)
    {
        if($request->get('keyword')){
        $keyword = $request['keyword'];
        $kategori = Kategori::where('title','LIKE','%'.$keyword.'%')->paginate(10);
        return view('admin.kategori.index', compact('kategori', 'keyword'));
    }else{
       
     return view('admin.kategori.listko');
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
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Flash::success($request->get('title') . ' category saved.');
        $this->validate($request, [
'title' => 'required|string|max:255|unique:kategoris',
'parent_id' => 'exists:kategoris,id'
]);
Kategori::create($request->all());
return redirect()->route('kategori.index');
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
    public function edit(Kategori $kategori)
    {
        //
         return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
    
        $category = Kategori::findOrFail($id);
        $this->validate($request, [
            'title' => 'required|string|max:255|unique:kategoris,title,' . $category->id,
            'parent_id' => 'exists:kategoris,id'
        ]);

        $category->update($request->all());
        \Flash::success($request->get('title') . ' category updated.');
        return redirect()->route('kategori.index');

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
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('kategori');
    }
}
