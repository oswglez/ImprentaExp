<?php

namespace App\Http\Controllers;
use App\client;
use App\contact;
use App\Http\Requests\UserFormRequest;
use Illuminate\Http\Request;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
            {
                $id                 = $request->get('id');
                $razon_social       = $request->get('razon_social');
                $nombre_fantasia    = $request->get('nombre_fantasia');
                $rut                = $request->get('rut');
                $refiere            = $request->get('refiere');
        
                $clients = Client::orderBy('id', 'ASC')
                    ->id($id)
                    ->razon_social($razon_social)
                    ->nombre_fantasia($nombre_fantasia)
                    ->rut($rut)
                    ->refiere($refiere)
                    ->paginate(4);

                    $clients->appends([
                      'id' => $id,  'razon_social' => $razon_social,   'nombre_fantasia' => $nombre_fantasia, 'rut' => $rut, 'refiere'=>$refiere]);
       
                return view('clients.index', compact('clients'));
            }
        


     //   $clients = client::simplePaginate(5);
     //   return view ('clients.index', ['clients' => $clients]);



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('clients.create');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new User();

        $client->id = request('id');
        $client->razon_social = request('razon_social');
        $client->nombre_fantasia = request('nombre_fantasia');
        $client->rut = request('rut');
        $client->refiere = request('refiere');
        $client->direccion_fiscal = request('direccion_fiscal');

        $client->save();
     
        return redirect('/clients');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        /* return view('clients.show', ['client'=> client::findOrFail($id)->contacts]);
        $client = client::findOrFail($id);
        $contacts = $client->contacts; 
        return $contacts;
 /*      
        $contacts = $client->contacts; 
        $orders = $client->orders; */
  //      return view('clients.stest', ['client'=> client::findOrFail($id)]);
        return view('clients.show', ['client'=> client::findOrFail($id), '$contacts', '$orders']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('clients.edit', ['client'=> client::findOrFail($id)]);
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
        $client = client::findOrFail($id);

        $client->id = $request->get('id');
        $client->razon_social = $request->get('razon_social');
        $client->nombre_fantasia = $request->get('nombre_fantasia');
        $client->rut = $request->get('rut');
        $client->refiere = $request->get('refiere');
        $client->direccion_fiscal = $request->get('direccion_fiscal');
        
        $client->update();
     
        return redirect('/clients');    
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
        $client = client::findOrFail($id);

        $client->delete();
        return redirect('/clients');
    }
}
