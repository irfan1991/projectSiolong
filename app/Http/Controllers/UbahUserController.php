<?php

namespace App\Http\Controllers;
use App\Barang;
use App\User;
use Illuminate\Http\Request;
use view;
use App\Http\Requests;
use Input;
use Auth;
use Redirect;
use Session;
class UbahUserController extends Controller
{
    /**
     * Display a listing of th   JJe resource.
     *
     * @return \Illuminate\Http\ResponsB
     */

   
    protected $rule = [
        'name'=>['required'],
        'username'=>['required'],
        'password' => ['required'],
        'email' =>['required'],
];
    
    public function profile()
{      
      $borrowLogs = Auth::user()->borrowLogs()->borrowed()->get();
            return view('auth.profile', compact('borrowLogs'));
}

    public function index()
    {
                    $borrowLogs = Auth::user()->borrowLogs()->borrowed()->get();
                    $barangku = Auth::user()->barang()->get();
                 $barang = Barang::orderBy('id','desc')->paginate(5);
                return view('auth.profile',compact('barang','barangku','borrowLogs'));
    }

    public function listku()
    {
                  $barang = Barang::orderBy('id','desc');
                return view('user.barang.list',compact('barang'));
    }


    public function listpinjam()
    {
                $borrowLogs = Auth::user()->borrowLogs()->borrowed()->get();
                return view('user.barang.listpinjam',compact('borrowLogs'));
    }

    /**
     * Show the form for creating a new resource.
     *;
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
       $this->validate($request, $this->rule);
       $input = array_except(Input::all(),'_method');

       if(Input::hasFile('image')){
        $file= array('image' =>Input::file('image'));
        if(Input::file('image')->isValidate()){
             $destinationPath = 'img/user'; 
             $extention= $file->getClientOriginalExtention();
               

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
 $barang = \DB::table('barangs')
                   ->join('users','users.id','=','barangs.id_user')
                   ->get();
        //$data['barang'] = $barang;
        $data['barang'] = Barang::find($id);
        return view('user.barang.show',$data);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
    
   return view('auth.setting',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update($id ,Request $request)
    {
        //
        $user = User::findOrFail($id);
        //$this->validate($request ,$this->rules);
        $input = array_except(Input::all(),'_method');

        if(Input::hasFile('image')){
            $file=array('image'=>Input::file('image'));
            if (Input::file('image')->isValid()) {
                $destinationPath= 'img/user';
                $extension = Input::file('image')->getClientOriginalExtension();
                $fileName = rand(11111,99999).'.'.$extension;
                Input::file('image')->move($destinationPath,$fileName);
                
               $pass = bcrypt($request->get('password'));
                $input['image'] = $fileName;
                $input['password'] = $pass;
                
        $user->fill($input)->save();

        Session::flash('flash_message', 'Task successfully added!');

                return
                Redirect::route('profile.index')->with('message','User Diupdate');

            }
        }

        else{
      

        $user->fill($input)->save();

        Session::flash('flash_message', 'Task successfully added!');

                return
                Redirect::route('profile.index')->with('message','User Gagal Disimpan');
        }
    }

    public function postUpdate() {

    # Update user in DB
    $user           = User::find(Auth::id());
    $user->name  = Input::get('name');
    $user->username = Input::get('username');
    $user-save();

    return Redirect::route('profile.index')
                ->withGlobal('Your account has been successfully updated');

}
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $barang = Barang::find($id);
        $barang->delete();
        return redirect('admin/barang');
    }
}
