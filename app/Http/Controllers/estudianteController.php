<?php

namespace estudiantes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requests;
use estudiantes\estudiante; 
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use estudiantes\Http\Requests\estudianteFormRequest;
use DB;

class estudianteController extends Controller
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
        $estudiantes=DB::table('estudiante as e')
        ->join('curso as c','e.idcurso','=','c.idcurso')
        ->select('e.idestudiante','e.nombre','e.edad','c.nombre as curso')
        ->where('e.nombre','LIKE','%'.$query.'%')
        ->orwhere('e.idestudiante','LIKE','%'.$query.'%')
        ->orderBy('e.idestudiante','desc')
        ->paginate(7);
        return view('estudiantes.estudiante.index',["estudiantes"=>$estudiantes, "searchText"=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos=DB::table('curso')->get();
        return view("estudiantes.estudiante.create", ["cursos"=>$cursos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(estudianteFormRequest $request)
    {
        $estudiante = new estudiante;
        $estudiante->idcurso=$request->get('idcurso');
        $estudiante->nombre=$request->get('nombre');
        $estudiante->edad=$request->get('edad');
        $estudiante->save();

        return Redirect::to('estudiantes/estudiante');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("estudiantes.estudiante.show",["estudiantes"=>estudiante::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $estudiante=estudiante::findorfail($id);
    $cursos=DB::table('curso')->get();
    return view("estudiantes.estudiante.edit",["estudiante"=>$estudiante , "cursos" => $cursos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(estudianteFormRequest $request, $id)
    {
        $estudiante=estudiante::findorfail($id);
        $estudiante->idcurso=$request->get('idcurso');
        $estudiante->nombre=$request->get('nombre');
        $estudiante->edad=$request->get('edad');
        $estudiante->update();
        return redirect::to('estudiantes/estudiante');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudiante=estudiante::findOrFail($id);
        $estudiante->delete();
        return redirect::to('estudiantes/estudiante');
    }
}
