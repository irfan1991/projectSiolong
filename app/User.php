<?php

namespace App;
use App\Exceptions\BarangException;
use App\Barang;
use App\Peminjam;
use  Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
class User extends Authenticatable
{
    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.

     *
     * @var array
     */

    protected $table= 'users';
    protected $fillable = [
        'username','name', 'email', 'password','addres','city','country','image','role','id_user'
    ];



    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
    ];

public function barang(){

    return $this->hasMany('App\Barang','id_user');
  }

 public function borrowLogs()
    {
        return $this->hasMany('App\Peminjam');
    }

    public function borrow(Barang $barang)
            {
            // cek apakah buku ini sedang dipinjam oleh user
            if($this->borrowLogs()->where('barang_id',$barang->id)->where('is_returned', 0)->count()>0 ) {
            throw new BarangException(" $barang->nama_barang sedang Anda pinjam.");
            }
            $borrowLog = Peminjam::create(['user_id'=>$this->id, 'barang_id'=>$barang->id]);
            return $borrowLog;
            }
          //  }
    
    public function generateVerificationToken()
    {
        $token = $this->verification_token;
        if (!$token) {
            $token = str_random(40);
            $this->verification_token = $token;
            $this->save();
        }
        return $token;
    }
    
    public function sendVerification()
    {
        $token = $this->generateVerificationToken();
        $user = $this;

        Mail::send('auth.emails.verification', compact('user', 'token'), function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('Verifikasi Akun Siolong');
        });
    }
    
    public function verify()
    {
        $this->is_verified = 1;
        $this->verification_token = null;
        $this->save();
    }
}
