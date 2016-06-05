<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Peminjam;
use App\Barang;
use App\User;
use App\Exceptions\BarangException;
use Auth;
use App\Http\Requests;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Input;
use Session;
use Redirect;
use App\Kategori;
use Image;
use File;
use Flash;

class UserBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *;
     * @return \Illuminate\Http\Response
     */
    

    public function __construct(){
        $this->middleware('auth');
    }
    protected $rules = [
            'nama_barang' => ['required'],
            'model' => ['required'],
            'deskripsi' => ['required'],
            'photo' => ['mimes:jpeg,png|max:10240'],
               'category_lists' => ['required'],    
                'price' => 'required|numeric|min:1000'        

    ];

    public function index()
    {
        //
        $barang = Barang::orderBy('id','desc')->paginate(10);
            return view('barang.index',compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.barang.create');
        
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

        $this->validate($request ,$this->rules);
        $input = array_except(Input::all(),'_method');

        if(Input::hasFile('photo')){
            $file=array('photo'=>Input::file('photo'));
            if (Input::file('photo')->isValid()) {
                $destinationPath= 'img/barang';
                $extension = Input::file('photo')->getClientOriginalExtension();
                $fileName = rand(11111,99999).'.'.$extension;
              Input::file('photo')->move($destinationPath,$fileName);
                $input['photo'] = $fileName;
              //  Image::make($input['photo'])->resize('100','110');


               $barang = Barang::create($input);
               $barang->kategori()->sync($request->get('category_lists'));
                $request->session()->flash('alert-success', 'User was successful added!');
             //  $notice2 ="Point anda bertambah dari meminjamkan barang";
                return
                Redirect::route('user.barang.create')->with('message','Barang Disimpan');

            }
        }

        else{
             Barang::create($input);
             $request->session()->flash('alert-success', 'User was not successful added!');
                return
                Redirect::route('user.barang.create')->with('message','Barang Gagal Disimpan');
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
        $barang = \DB::table('barangs')
                   ->join('users','users.id','=','barangs.id_user')
                   ->get();
        //$data['barang'] = $barang;
        $data['barang'] = Barang::find($id);
        return view('user.barang.show',$data);

    }


     public function borrow($id)
            {
            try {
            $barang = Barang::findOrFail($id);
            Auth::user()->borrow($barang);
            Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil memasukkan data peminjaman $barang->nama_barang, segera hubungi Admin Siolong"
            ]);
             return redirect('/');
            } catch (BarangException $e) {
            Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>$e->getMessage()
            ]);
             return redirect('/user/barang/'.$barang->id."/showpinjam");
            } catch (ModelNotFoundException $e) {
            Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Barang tidak ditemukan."
            ]);

             return redirect('/user/barang/'.$barang->id."/showpinjam");
            }
           
            }
            //}

            

    public function showPinjam($id)

    {
        $barang = \DB::table('barangs')
                   ->join('users','users.id','=','barangs.id_user')
                   ->get();
               $data['barang'] = Barang::find($id);
        return view('user.barang.showpinjam',$data);

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
        return view('User.barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 public function deletePhoto($filename)
    {
        $path = public_path() . DIRECTORY_SEPARATOR . 'img/barang'
            . DIRECTORY_SEPARATOR . $filename;
        return File::delete($path);
    }
    


protected function savePhoto(UploadedFile $photo)
            {
            $fileName = str_random(40) . '.' . $photo->guessClientExtension();
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img/barang';
            $photo->move($destinationPath, $fileName);
            return $fileName;
            }

    


    public function update(Request $request , $id)
    {
        //
        $this->validate($request ,$this->rules);
       $barang= Barang::findOrFail($id);
       $data = $request->only('nama_barang', 'model', 'price');
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
            return redirect('listpro');

    }
    

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
        \Flash::success($barang->nama_barang .'deleted.');
        return redirect('listpro');}
}
