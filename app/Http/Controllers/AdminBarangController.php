<?php

namespace App\Http\Controllers;
use App\Barang;
use App\Peminjam;
use Illuminate\Http\Request;
use Input;
use Session;
use Redirect;
use App\Http\Requests;
use Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\User;
use File;
use Flash;

class AdminBarangController extends Controller
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

    protected $rules = [
            'nama_barang' => ['required'],
            'model' => ['required'],
            'deskripsi' => ['required'],
          //   'photo' => ['mimes:jpeg,png|max:10240'],
            'category_lists' => ['required'],    
                'price' => 'required|numeric|min:1000'        
               


    ];

   

    public function index()
    {
        //
         $barang = Barang::orderBy('id','desc')->paginate(5);
                return view('admin.barang.index',compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.barang.create');
        
    }


public function search(Request $request)
    {

            
    if($request->get('keyword')){
        $keyword = $request['keyword'];
        $barang         = Barang::where('nama_barang', 'LIKE', '%'.$keyword.'%')->paginate(5);
        $data['barang'] = $barang->setPath('barang');
        return view('admin.barang.index',$data);
        // Flash::error('Message');
    }else{
       // Flash::error('isi data pada kolom pencarian');
     return view('admin.barang.listko');
    }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



protected function savePhoto(UploadedFile $photo)
            {
            $fileName = str_random(40) . '.' . $photo->guessClientExtension();
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img/barang';
            $photo->move($destinationPath, $fileName);
            return $fileName;
            }

 public function deletePhoto($filename)
    {
        $path = public_path() . DIRECTORY_SEPARATOR . 'img/barang'
            . DIRECTORY_SEPARATOR . $filename;
        return File::delete($path);
    }
    

    public function store(Request $request)
    {
        //

        $this->validate($request ,$this->rules);
       
        $data = $request->only('nama_barang', 'model', 'price','deskripsi');

        if ($request->hasFile('photo')) {
            $data['photo'] = $this->savePhoto($request->file('photo'));
        }

        $barang= Barang::create($data);
        $barang->kategori()->sync($request->get('category_lists'));

        \Flash::success($barang->nama_barang . ' saved.');
        return redirect()->route('admin.barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

         $barang = \DB::table('barangs')
                   ->join('users','users.id','=','barangs.id_user')
                   ->get();
        //$data['barang'] = $barang;
        $data['barang'] = Barang::find($id);
        return view('admin.barang.show',$data);

        //$barang =  Barang::find($id);
        //return view('admin.barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Barang $barang)
    {
        //
        //$data['barangs'] = Barang::find($id);
        return view('admin.barang.edit', compact('barang'));
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
        
        $this->validate($request ,$this->rules);
       $barang= Barang::findOrFail($id);
       $data = $request->only('nama_barang', 'model', 'price','deskripsi');
            if ($request->hasFile('photo')) {
            $data['photo'] = $this->savePhoto($request->file('photo'));
            if ($barang->photo !== '') $this->deletePhoto($barang->photo);
            }
            $barang->update($data);
            if (count($request->get('category_lists')) > 0) {
            $barang->kategori()->sync($request->get('category_lists'));
            } else {
            // no category set, detach all
            $barang->kategori()->detach();
            }
            \Flash::success($barang->nama_barang . ' updated.');
            return redirect('admin/barang');
    }
    


 
    /**




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
       $barang = Barang::find($id);
        if ($barang->photo !== '') $this->deletePhoto($barang->photo);
        $barang->delete();
        \Flash::success($barang->nama_barang .' deleted.');
        return redirect('/admin/barang');}
}
