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
    public function format($produk)
    {
        return [
            'id' => $produk->id,
            'name' => $produk->name,
            'deskripsi' => $produk->deskripsi,
            'harga' => $produk->harga,
            'stock' => $produk->stock,
            'category' => $produk->category,
            'image' => $produk->image,
            'is_best_seller' => $produk->is_best_seller,
            'tanggal_tambah_produk' => Carbon::parse($produk->created_at)->format('d f Y'),
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
            'message' => $msg
        ], 200);
    }

    public function indexProduk()
    {
        $produk = Produk::get()
            ->map(function ($produk) {
                return $this->format($produk);
            });
        return $this->respons($produk);
    }

    public function detailProduk($id)
    {
        $produk = Produk::where('id', $id)->get()
            ->map(function ($produk) {
                return $this->format($produk);
            });
        return $this->respons($produk);
    }

    public function createProduk(Request $request)
    {
        $validasi = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required|numeric',
                'stock' => 'required',
                'category' => 'required|in:food,drink,snack',
                'image' => 'required|image|mimes:jpeg,png,jpg',
            ]
        );

        if ($validasi->fails()) {
            $valIndex = $validasi->errors()->all();
            return MessageHelper::error(false, $valIndex[0]);
        }

        $filename = time() . ',' . $request->image->extension();
        $request->image->storeAs('public/products', $filename);

        $produk = Produk::create([
            'name' => $request->name,
            'harga' => (int) $request->harga,
            'stock' => (int) $request->stock,
            'category' => $request->category,
            'deskripsi' => $request->deskripsi,
            'image' => $filename,
            'is_best_seller' => $request->is_best_seller
        ]);

        $produk = Produk::where('id', $produk->id)
            ->get()
            ->map(function ($produk) {
                return $this->format($produk);
            });
        return $this->respons($produk);
    }


    public function deleteProduk($id)
    {
        $produk = Produk::where('id', $id)->first();
        if (!$produk) {
            return MessageHelper::error(false, 'DataProduk Gagal Dihapus');
        }

        Storage::delete($produk->image);

        $produk->delete();
        return MessageHelper::error(true, 'DataProduk Berhasil Dihapus');
    }


    public function updateProduk(Request $request, $id)
    {

        $produk = Produk::where('id', $id)->first();
        if (!$produk) {
            return MessageHelper::error(false, 'DataProduk Gagal Diupdate');
        }
        $validasi = Validator::make(

            $request->all(),
            [
                'name' => ['required'],
                'deskripsi' => ['required'],
                'harga' => 'required|numeric',
                'stock' =>  ['required'],
                'image' =>  ['required'],
                'category' =>  ['required'],
            ]
        );



        if ($validasi->fails()) {
            $valIndex = $validasi->errors()->all();
            return MessageHelper::error(false, $valIndex[0]);
        }


        $produk->update([
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'image' => $request->file('image')->store('images'),
            'category' => $request->category,
        ]);

        $produk = Produk::where('id', $produk->id)
            ->get()
            ->map(function ($produk) {
                return $this->format($produk);
            });


        $msg = 'DataProduk Berhasil Diupdate';
        $token = $produk->createToken('auth_token')->plainTextToken;
        return MessageHelper::resultAuth(true, $msg, $produk, 200, $token);
    }
}