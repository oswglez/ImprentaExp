<?php

namespace App\Http\Controllers;
use App\log_system;
use App\Http\Requests\UserFormRequest;
use Illuminate\Http\Request;

class log_systemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $log_systems = log_system::simplePaginate(5);
        return view ('log_systems.index', ['log_systems' => $log_systems]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('log_systems.create');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $log_system = new User();

        $log_system->level = request('level');
        $log_system->date = request('date');
        $log_system->message = request('message');
        $log_system->requesturi = request('requesturi');
        $log_system->ip = request('ip');

        $log_system->save();
     
        return redirect('/log_systems');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('log_systems.show', ['user'=> log_system::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('log_systems.edit', ['log_system'=> log_system::findOrFail($id)]);
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
        $log_system = log_system::findOrFail($id);

        $log_system->level = $request->get('level');
        $log_system->date = $request->get('date');
        $log_system->message = $request->get('message');
        $log_system->requesturi= $request->get('requesturi');
        $log_system->ip = $request->get('ip');
            
        $log_system->update();
     
        return redirect('/log_systems');    
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
        $log_system = log_system::findOrFail($id);

        $log_system->delete();
        return redirect('/log_systems');
    }
}
