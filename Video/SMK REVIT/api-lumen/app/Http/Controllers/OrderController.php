<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Tampilkan daftar semua pesanan.
     */
    public function index()
    {
        $data = DB::table('orders')
            ->join('pelanggans', 'pelanggans.idpelanggan', '=', 'orders.idpelanggan')
            ->select('orders.*', 'pelanggans.pelanggan', 'pelanggans.alamat', 'pelanggans.telp')
            ->orderBy('orders.status', 'asc')
            ->get();

        return response()->json($data);
    }

    /**
     * Tampilkan form untuk membuat pesanan baru (tidak digunakan API).
     */
    public function create()
    {
        //
    }

    /**
     * Simpan data pesanan baru.
     */
    public function store(Request $request)
    {
        // Tambahkan jika diperlukan membuat order baru
    }

    /**
     * Tampilkan detail pesanan tertentu berdasarkan tanggal (satu atau dua tanggal).
     */
    public function show($a, $b = null)
    {
        $query = DB::table('orders')
            ->join('pelanggans', 'pelanggans.idpelanggan', '=', 'orders.idpelanggan')
            ->select('orders.*', 'pelanggans.pelanggan', 'pelanggans.alamat', 'pelanggans.telp');

        if ($b === null) {
            // Jika hanya satu tanggal
            $query->whereDate('orders.tglorder', $a);
        } else {
            // Jika dua tanggal (range)
            $query->whereBetween('orders.tglorder', [$a, $b]);
        }

        $orders = $query->orderBy('orders.status', 'asc')->get();

        return response()->json($orders);
    }

    /**
     * Tampilkan form untuk edit pesanan tertentu (tidak digunakan API).
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update data pesanan.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'bayar' => 'required|numeric',
            'kembali' => 'required|numeric',
            'status' => 'required|numeric',
        ]);

        $data = [
            'bayar' => $request->input('bayar'),
            'kembali' => $request->input('kembali'),
            'status' => $request->input('status'),
        ];

        $order = Order::where('idorder', $id)->update($data);

        if ($order) {
            return response()->json([
                'pesan' => 'Pesanan sudah dibayar'
            ]);
        } else {
            return response()->json([
                'pesan' => 'Update gagal atau data tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Hapus data pesanan.
     */
    public function destroy($id)
    {
        $deleted = Order::where('idorder', $id)->delete();

        if ($deleted) {
            return response()->json(['pesan' => 'Pesanan dihapus']);
        } else {
            return response()->json(['pesan' => 'Pesanan tidak ditemukan'], 404);
        }
    }
}
