<?php

namespace App\Http\Controllers;
use App\franja;
use App\Http\Requests\UserFormRequest;
use Illuminate\Http\Request;

class franjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $franjas = franja::simplePaginate(5);
        return view ('franjas.index', ['franjas' => $franjas]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('franjas.create');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $franja = new User();

        $franja->min = request('min');
        $franja->max = request('max');
        $franja->type = request('type');
        $franja->disponible = request('disponible');
       

        $franja->save();
     
        return redirect('/franjas');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('franjas.show', ['user'=> franja::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('franjas.edit', ['franja'=> franja::findOrFail($id)]);
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
        $franja = franja::findOrFail($id);


        $franja->min = $request->get('min');
        $franja->max = $request->get('max');
        $franja->type = $request->get('type');
        $franja->disponible = $request->get('disponible');
       
        
        $franja->update();
     
        return redirect('/franjas');    
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
        $franja = franja::findOrFail($id);

        $franja->delete();
        return redirect('/franjas');
    }
}
