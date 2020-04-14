<?php

namespace App\Http\Controllers;
use App\Tarea;
use App\Http\Requests\UserFormRequest;
use Illuminate\Http\Request;

class tareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = Tarea::simplePaginate(5);
        return view ('tareas.index', ['tareas' => $tareas]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('tareas.create');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarea = new User();

        $tarea->nombre = request('nombre');
        $tarea->codigo = request('codigo');
        $tarea->formula = request('formula');

        $tarea->save();
     
        return redirect('/tareas');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('tareas.show', ['user'=> Tarea::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('tareas.edit', ['tarea'=> tarea::findOrFail($id)]);
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
        $tarea = Tarea::findOrFail($id);

        $tarea->nombre = $request->get('nombre');
        $tarea->codigo = $request->get('codigo');
        $tarea->formula = $request->get('formula');
        
        $tarea->update();
     
        return redirect('/tareas');    
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
        $tarea = Tarea::findOrFail($id);

        $tarea->delete();
        return redirect('/tareas');
    }
}
