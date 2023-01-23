<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Http\Requests\StoreRegistroRequest;
use App\Http\Requests\UpdateRegistroRequest;
use App\Models\Area;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['areas']=Area::get();
        return view('create', $data);
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
    public function lista(){
        $data['registros']=Registro::paginate(3);
        return view('dashboard', $data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegistroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegistroRequest $request)
    {
        $request->validated();
        $nroexpediente = time();
        if($request->hasFile('archivo')){
            $file = $request->file('archivo');
            $filename = $nroexpediente.'.'.$file->extension();
            $request->archivo=$filename;
            $file->move(public_path('archivos'), $filename);   
        }else{
            echo 'NO EXISTE ARCHIVO';
            return 0;
        }
        $expediente = Registro::Create([
            'tipodocumento' => $request->tipodocumento,
            'nrodocumento' => $request->nrodocumento,
            'entidad'   => $request->entidad,
            'email'   => $request->email,
            'celular'   => $request->celular,
            'area'   => $request->area,            
            'asunto'   => $request->asunto,
            'nroexpediente' => $nroexpediente,
            'archivo'       => $request->archivo
        ]);
        $expediente->save();
        return view('registrado', compact('expediente'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function show(Registro $registro)
    {
        $data['areas']=Area::get();
        $data['registro']=$registro;
        return view('show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function edit(Registro $registro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegistroRequest  $request
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegistroRequest $request, Registro $registro)
    {
        $registro->area=$request->area;
        $registro->estado=$request->estado;
        $registro->save();
        return redirect()->route('intranet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registro $registro)
    {
        $registro->delete();
        return redirect()->route('intranet');
    }
}
