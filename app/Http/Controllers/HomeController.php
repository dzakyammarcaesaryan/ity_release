<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Checkout;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $semuaBuku = Buku::all();
        return view('home', compact('semuaBuku'));
    }
    public function dataBuku(Request $request){
        if($request->ajax()){

            $data = Buku::all();
            return response()->json($data);
        }

    }
    public function checkout(Request $request,$id)
    {
        $buku = Buku::find($id);

        return view('checkout', compact('buku'));
    }
    public function precessCheckout(Request $request)
    {
        // Validasi form input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nomer_telepon' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string',
            'jumlah' => 'required|integer|min:1',
            'total_harga' => 'required',
        ]);

        // Simpan pesanan
        $order = Checkout::create([
            'name' => $validated['name'],
            'nomer_telepon' => $validated['nomer_telepon'],
            'email' => $validated['email'],
            'alamat' => $validated['alamat'],
            'jumlah' => $validated['jumlah'],
            'total_harga' => $validated['total_harga'], // Misalkan harga per buku adalah 500.000
        ]);

        // return redirect()->route('payment')->with('order', $order);
        return redirect()->route('home');
    }
}
