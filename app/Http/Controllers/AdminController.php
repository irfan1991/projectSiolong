<?php

namespace App\Http\Controllers;
use View;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Http\Requests;
use Session;
use App\Http\Requests\ContactFormRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function rules()
{
  return [
    'name' => 'required',
    'email' => 'required|email',
    'message' => 'required',
  ];
}



    public function index()
    {

       
        $users = [];
        $barangs = [];
        foreach ( User::all() as $user) {
            array_push($users, $user->name);
            array_push($barangs, $user->borrowLogs()->borrowed()->count() + $user->barang->count());
        }

        return view('admin.layout.haladmin', compact('users', 'barangs'));
    }





    public function grafikPin(){
        $users = [];
        $barangs = [];
        foreach ( User::all() as $user) {
            array_push($users, $user->name);
            array_push($barangs, $user->borrowLogs()->borrowed()->count() + $user->barang->count());
        }

        return view('admin.grafik.point', compact('users', 'barangs'));
    }

     

    public function grafikPij(){
        $users = [];
        $barangs = [];
        foreach ( User::all() as $user) {
            array_push($users, $user->name);
            array_push($barangs, $user->borrowLogs()->borrowed()->count());
        }

        return view('admin.grafik.meminjam', compact('users', 'barangs'));
    }



public function grafikMe(){
        $users = [];
        $barangs = [];
        foreach ( User::all() as $user) {
            array_push($users, $user->name);
            array_push($barangs, $user->barang->count());
        }

        return view('admin.grafik.meminjamkan', compact('users', 'barangs'));
    }








      public function showpoint()
    {
        //

         $member = Role::where('name','!=','admin')->first()->users;

      //  $borrowLogs = User->borrowLogs()->borrowed()->get();
                    //$barangku = Auth::user()->barang()->get();
                // $barang = Barang::orderBy('id','desc')->paginate(5);
                return view('admin.peminjaman.point',compact('member'));
    }


public function search(Request $request)
    {

            if($request->get('keyword')){
        $keyword = $request['keyword'];
               $member = User::where('name', 'LIKE', '%'.$keyword.'%')
        ->where('username', '<>', 'admin')
                     ->orderBy('id','desc')
                     ->paginate(6);
               return view('admin.peminjaman.point',compact('member'));
    }else{
            return view('admin.peminjaman.listkos',compact('member'));
    }

}
    public function show($id)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
         $user = User::findOrFail($id);
        return view('admin.user.contact', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactFormRequest $request)
  {


   

   $users =  $request->get('email');
        
    
    \Mail::send('auth.emails.contact',
        array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_message' => $request->get('message')
        ), function($message) use ($users)
    {

    
        $message->from('wj@wjgilmore.com', 'Admin');
        $message->to($users)->subject('Informasi Admin Si OLONG');
    });
      Session::flash("flash_notification", [
                "level"=>"success",
                "message"=>"Berhasil Mengirim email " 
            ]);

  return \Redirect::route('admin.peminjaman.index')->with('message', 'Thanks for contacting us!');

  }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

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



     protected function adminDashboard()
    {
        
    }
}
