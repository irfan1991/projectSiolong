<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User ;
use App\Http\Requests;
use Input;
use Redirect;
use App\Barang;
use App\Peminjam;
use Session;
use Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use File;
use Flash;

class TableUserController extends Controller
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
            'name' => ['required'],
            'username' => ['required'],
            'addres' => ['required'],
            'city' => ['required'],
            'country' =>['required'],
            'image' =>['mimes:jpeg,png|max:10240']

    ];

    public function index()
    {
        //
    $user = \DB::table('users')
                    ->where('username', '<>', 'admin')
                     ->orderBy('id','desc')
                     ->paginate(5);

        return view('admin.user.index',compact('user'));
    }

   public function search(Request $request)
    {
         if($request->get('keyword')){
        $keyword = $request['keyword'];
        $user         = User::where('name', 'LIKE', '%'.$keyword.'%')->paginate(5);
        $data['user'] = $user->setPath('user');
        return view('admin.user.index',$data);
      }else{
       
    return view('admin.user.listkosong');
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create() 
    {
        return view('auth.createProfile');
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
       $this->validate($request, $this->rules);
       $input = array_except(Input::all(),'_method');

       if(Input::hasFile('image')){
        $file= array('image' =>Input::file('image'));
        if(Input::file('image')->isValidate()){
             $destinationPath = 'img/user'; 
             $extention= $file->getClientOriginalExtention();
                User::create($input);
               
                return
                Redirect::route('listuser.index')->with('message','Data Account Disimpan');

            }
        }

        else{
            User::create($input);
                return
                Redirect::route('listuser.index')->with('message','Data Account Gagal Disimpan');
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
         $user = \DB::table('users')
                   ->join('barangs','users.id','=','barangs.id_user')
                   ->get();
        //$data['barang'] = $barang;
        $data['user'] = User::find($id);
        return view('admin.user.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           $user = User::findOrFail($id);

       
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response

     */
    protected function savePhoto(UploadedFile $photo)
            {
            $fileName = str_random(40) . '.' . $photo->guessClientExtension();
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img/user';
            $photo->move($destinationPath, $fileName);
            return $fileName;
            }

 public function deletePhoto($filename)
    {
        $path = public_path() . DIRECTORY_SEPARATOR . 'img/user'
            . DIRECTORY_SEPARATOR . $filename;
        return File::delete($path);
    }
 public function update(Request $request,$id)
    {
        //
          $this->validate($request ,$this->rules);
       $user= User::findOrFail($id);
       $data = $request->only('name', 'addres', 'email','country','username','city');
            if ($request->hasFile('image')) {
            $data['image'] = $this->savePhoto($request->file('image'));
            if ($user->image !== '') $this->deletePhoto($user->image);
            }
            $user->update($data);
           
            \Flash::success($user->name . ' updated.');
            return redirect('listuser');
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
         $user = User::findOrFail($id);
        $user->delete();
        return redirect('listuser');
    }
}
