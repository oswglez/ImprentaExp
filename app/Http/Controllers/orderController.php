<?php

namespace App\Http\Controllers;
use App\order;
use App\client;
use App\work_type;
use App\work_subtype;
use App\contact;

use Illuminate\Http\Request;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * <div class="form-group">
     * 
     * <?php
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $numero                     = $request->get('numero');
        $razon_social               = $request->get('razon_social');
        $nombre_fantasia            = $request->get('nombre_fantasia');
        $work_type_descripcion      = $request->get('work_type_descripcion');
        $work_subtype_descripcion   = $request->get('work_subtype_descripcion');
        $descripcion                = $request->get('descripcion');

    
        $orders = Order::orderBy('numero', 'ASC')
            ->numero($numero)
            ->razon_social($razon_social)
            ->nombre_fantasia($nombre_fantasia)
            ->work_type_descripcion($work_type_descripcion)
            ->work_subtype_descripcion($work_subtype_descripcion)
            ->descripcion($descripcion)
            ->simplePaginate(4);
    
            $orders->appends([
                'numero' => $numero,  'razon_social' => $razon_social, 'nombre_fantasia' => $nombre_fantasia, 'work_type_descripcion' => $work_type_descripcion, 'work_subtype_descripcion' => $work_subtype_descripcion, $descripcion, 'descripcion']);

            return view('orders.index', compact('orders'));

            //   $order = client::simplePaginate(5);
     //   return view ('orders.index', ['orders' => $orders]);


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
    public function main($id)
    {
        return view('orders.html', ['order'=> Order::findOrFail($id)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('orders.show', ['order'=> Order::findOrFail($id)]);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "eeeeeeee";
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
