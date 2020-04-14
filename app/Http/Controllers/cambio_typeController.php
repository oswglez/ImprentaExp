<?php

namespace App\Http\Controllers;
use App\cambio_type;
use App\Http\Requests\UserFormRequest;
use Illuminate\Http\Request;

class cambio_typeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cambio_types = cambio_type::simplePaginate(5);
        return view ('cambio_types.index', ['cambio_types' => $cambio_types]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('cambio_types.create');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cambio_type = new User();

        $cambio_type->created = request('created');
        $cambio_type->monto = request('monto');

        $cambio_type->save();
     
        return redirect('/cambio_types');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('cambio_types.show', ['user'=> cambio_type::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('cambio_types.edit', ['cambio_type'=> cambio_type::findOrFail($id)]);
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
        $cambio_type = cambio_type::findOrFail($id);

        $cambio_type->created = $request->get('created');
        $cambio_type->monto = $request->get('monto');
            
        $cambio_type->update();
     
        return redirect('/cambio_types');    
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
        $cambio_type = cambio_type::findOrFail($id);

        $cambio_type->delete();
        return redirect('/cambio_types');
    }
}
