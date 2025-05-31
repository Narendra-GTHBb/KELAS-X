<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($a, $b)
    {
        $query = DB::table('details')
        ->join('orders', 'details.idorder', '=', 'orders.idorder')
        ->join('menus', 'menus.idmenu', '=', 'details.idmenu')
        ->join('pelanggans', 'pelanggans.idpelanggan', '=', 'orders.idpelanggan')
        ->join('kategoris', 'kategoris.idkategori', '=', 'menus.idkategori')
        ->select('orders.*', 'details.*','menus.*','pelanggans.*','kategoris.*');

            if ($b === null) {
                // Jika hanya satu tanggal
                $query->whereDate('orders.tglorder', $a);
            } else {
                // Jika dua tanggal (range)
                $query->whereBetween('orders.tglorder', [$a, $b]);
            }

            $orders = $query->orderBy('orders.tglorder', 'asc')->get();

            return response()->json($orders);
    }

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
}
