<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $data = DB::table('menus')
            ->join('kategoris', 'menus.idkategori', '=', 'kategoris.idkategori')
            ->select('menus.*', 'kategoris.kategori')
            ->orderBy('menus.menu', 'asc')
            ->get();

        return response()->json($data);
    }

    public function create(Request $request)
    {
        $request->validate([
            'menu' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'idkategori' => 'required|exists:kategoris,idkategori',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $gambarPath = null;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gambar_menu', 'public');
        }

        $menu = Menu::create([
            'menu' => $request->menu,
            'harga' => $request->harga,
            'idkategori' => $request->idkategori,
            'gambar' => $gambarPath
        ]);

        if ($menu) {
            return response()->json([
                'pesan' => 'Data Berhasil Disimpan'
            ]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'idkategori' => 'required|exists:kategoris,idkategori',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $gambarPath = null;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gambar_menu', 'public');
        }

        $menu = Menu::create([
            'menu' => $request->menu,
            'harga' => $request->harga,
            'idkategori' => $request->idkategori,
            'gambar' => $gambarPath
        ]);

        return response()->json([
            'pesan' => 'Menu berhasil ditambahkan',
            'data' => $menu
        ], 201);
    }

    public function show($id)
    {
        $menu = DB::table('menus')
            ->join('kategoris', 'menus.idkategori', '=', 'kategoris.idkategori')
            ->select('menus.*', 'kategoris.kategori')
            ->where('menus.idmenu', $id)
            ->first();

        if (!$menu) {
            return response()->json(['pesan' => 'Menu tidak ditemukan'], 404);
        }

        return response()->json($menu);
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return response()->json(['pesan' => 'Menu tidak ditemukan'], 404);
        }

        $request->validate([
            'menu' => 'nullable|string|max:255',
            'harga' => 'nullable|numeric',
            'idkategori' => 'nullable|exists:kategoris,idkategori',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            if ($menu->gambar) {
                Storage::disk('public')->delete($menu->gambar);
            }
            $menu->gambar = $request->file('gambar')->store('gambar_menu', 'public');
        }

        $menu->menu = $request->menu ?? $menu->menu;
        $menu->harga = $request->harga ?? $menu->harga;
        $menu->idkategori = $request->idkategori ?? $menu->idkategori;
        $menu->save();

        return response()->json([
            'pesan' => 'Data menu berhasil diperbarui',
            'data' => $menu
        ]);
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return response()->json(['pesan' => 'Menu tidak ditemukan'], 404);
        }

        if ($menu->gambar) {
            Storage::disk('public')->delete($menu->gambar);
        }

        $menu->delete();

        return response()->json([
            'pesan' => 'Data berhasil dihapus'
        ]);
    }
}