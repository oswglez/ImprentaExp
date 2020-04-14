<?php

namespace App\Http\Controllers;
use App\Troquel;
use App\Http\Requests\UserFormRequest;
use Illuminate\Http\Request;

class troquelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $troquels = troquel::simplePaginate(5);
        return view ('troquels.index', ['troquels' => $troquels]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('troquels.create');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $troquel = new User();

        $troquel->nombre = request('codigo');
        $troquel->codigo = request('tipo');
        $troquel->formula = request('descripcion');
        $troquel->nombre = request('formato');
        $troquel->codigo = request('pliego_minimo');
        $troquel->formula = request('bocas');

        $troquel->save();
     
        return redirect('/troquels');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('troquels.show', ['user'=> troquel::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('troquels.edit', ['troquel'=> troquel::findOrFail($id)]);
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
        $troquel = troquel::findOrFail($id);

        $troquel->codigo = $request->get('codigo');
        $troquel->tipo = $request->get('tipo');
        $troquel->descripcion = $request->get('descripcion');
        $troquel->formato = $request->get('formato');
        $troquel->pliego_minimo = $request->get('pliego_minimo');
        $troquel->bocas = $request->get('bocas');
        
        
        $troquel->update();
     
        return redirect('/troquels');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'Destruyendo';
        $troquel = troquel::findOrFail($id);

        $troquel->delete();
        return redirect('/troquels');
    }
}
