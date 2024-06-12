<?php

namespace App\Http\Controllers\Api;

use App\Helpers\MessageHelper;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProdukApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //     $produk = Produk::get()
    //     ->map(function ($produk) {
    //         return $this->format($produk);
    //     });
    // return $this->respons($produk);

     //all products
     $products = Produk::orderBy('id', 'desc')->get();
     return response()->json([
         'success' => true,
         'message' => 'List Data Product',
         'data' => $products
     ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'category' => 'required|in:food,drink,snack',
            'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $filename = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/products', $filename);
        $product = Produk::create([
            'name' => $request->name,
            'price' => (int) $request->price,
            'stock' => (int) $request->stock,
            'category' => $request->category,
            'image' => $filename,
            'is_best_seller' => $request->is_best_seller
        ]);

        if ($product) {
            return response()->json([
                'success' => true,
                'message' => 'Product Created',
                'data' => $product
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product Failed to Save',
            ], 409);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produk = Produk::where('id', $id)
            ->get()
            ->map(function ($produk) {
                return $this->format($produk);
            });
        return $this->respons($produk);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::where('id', $id)->first();

        if(!$produk) {
            return MessageHelper::error(false, 'Data Tidak ditemukan');
        }

        Storage::delete($produk->image);
        $produk->delete();
        return MessageHelper::error(true, 'Berhasil Menghapus Data');
    }

    public function format($produk)
    {

        return [
            'id' => $produk->id,
            'name' => $produk->name,
            'deskripsi' => $produk->deskripsi,
            'price' => $produk->price,
            'stock' => $produk->stock,
            'category' => $produk->category,
            'image' => $produk->image,
            'is_best_seller' => $produk->is_best_seller,
            'tanggal_tambah_produk' => Carbon::parse($produk->created_at)->translatedFormat('d F Y'),
        ];
    }

    public function respons($produk)
    {
        return response()->json([
            'status' => true,
            'data' => $produk,
        ], 200);
    }

    public function errorStatus($status, $msg)
    {
        return response()->json([
            'status' => $status,
            'message' => $msg,
        ], 200);
    }
}