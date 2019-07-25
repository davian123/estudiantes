<?php

namespace estudiantes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requests;
use estudiantes\materia; 
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use estudiantes\Http\Requests\materiaFormRequest;
use DB;

class materiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

         $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $query=trim($request->get('searchText'));
        $materias=DB::table('materias as m')
        ->select('m.idmaterias','m.nombre')
        ->where('m.nombre','LIKE','%'.$query.'%')
        ->orwhere('m.idmaterias','LIKE','%'.$query.'%')
        ->orderBy('m.idmaterias','desc')
        ->paginate(7);
        return view('estudiantes.materia.index',["materias"=>$materias, "searchText"=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
        return view("estudiantes.materia.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(materiaFormRequest $request)
    {
        $materias = new materia;
        $materias->nombre=$request->get('nombre');
        $materias->save();

        return Redirect::to('estudiantes/materia');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("estudiantes.materia.show",["materias"=>materia::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $materia=materia::findorfail($id);
    return view("estudiantes.materia.edit",["materia"=>$materia]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(materiaFormRequest $request, $id)
    {
        $materia = materia::findorfail($id);
        $materia->nombre=$request->get('nombre');
        $materia->update();
        return redirect::to('estudiantes/materia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materia=materia::findOrFail($id);
        $materia->delete();
        return redirect::to('estudiantes/materia');
    }
}
