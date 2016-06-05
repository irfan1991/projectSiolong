<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barang;
use Session;
use App\Support\CartService;
use Flash;
use Auth;
use App\Cart;

class CartController extends Controller
{

	protected  $cart;

	 public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

	public function addProduct(Request $request)
			{
			$this->validate($request, [
			'barang_id' => 'required|exists:barangs,id',
			//'quantity' => 'required|integer|min:1'
			]);
			$barang = Barang::find($request->get('barang_id'));
			$quantity = $request->get('quantity');
			Session::flash('flash_product_name', $barang->nama_barang);

 		if (Auth::check()) {
            $cart = Cart::firstOrCreate([
                'barang_id' => $barang->id,
                'user_id' => $request->user()->id
            ]);
           $cart->quantity += $quantity;
            $cart->save();
            return redirect('catalogs');
        } else {
            $cart = $request->cookie('cart', []);
            if (array_key_exists($barang->id, $cart)) {
                $quantity += $cart[$barang->id];
            }
            $cart[$barang->id] = $quantity;
            return redirect('catalogs')
                ->withCookie(cookie()->forever('cart', $cart));
        }
			}



			public function show()
				{
				return view('carts.index');
				}

			
			   public function removeProduct(Request $request, $barang_id)
				{

						 $barang = \DB::table('barangs')
                   ->join('users','users.id','=','barangs.id_user')
                   ->get();

				if (Auth::check()) {
					$cart = Cart::firstOrCreate([
					'barang_id' => $barang_id,
					'user_id' => $request->user()->id
					]);

					$cart->delete();
					
					return redirect('user/barang/'.$barang_id.'/showpinjam');
					} else {
					$cart = $request->cookie('cart', []);
					unset($cart[$barang_id]);
					return redirect('cart')
					->withCookie(cookie()->forever('cart', $cart));
					}
				}


}
