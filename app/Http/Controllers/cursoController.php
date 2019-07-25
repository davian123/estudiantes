<?php

namespace estudiantes\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Requests;
use estudiantes\curso; 
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use estudiantes\Http\Requests\cursoFormRequest;
use DB;

class cursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
       
        $query=trim($request->get('searchText'));
        $cursos=DB::table('curso as c')
        ->join('materias as m','c.idmaterias','=','m.idmaterias')
        ->select('c.idcurso','c.nombre','c.salon_curso','m.nombre as materia')
        ->where('c.nombre','LIKE','%'.$query.'%')
        ->orwhere('c.idcurso','LIKE','%'.$query.'%')
        ->orderBy('c.idcurso','desc')
        ->paginate(7);
        return view('estudiantes.curso.index',["cursos"=>$cursos, "searchText"=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        $materias=DB::table('materias')->get();
        return view("estudiantes.curso.create" , ["materias"=>$materias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(cursoFormRequest $request)
    {
        $curso = new curso;
        $curso->idmaterias=$request->get('idmaterias');
        $curso->nombre=$request->get('nombre');
        $curso->salon_curso=$request->get('salon_curso');
        $curso->save();

        return Redirect::to('estudiantes/curso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("estudiantes.curso.show",["curso"=>curso::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $curso=curso::findorfail($id);
    $materias=DB::table('materias')->get();
    return view("estudiantes.curso.edit",["curso"=>$curso , "materias" => $materias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(cursoFormRequest $request, $id)
    {
        $curso=curso::findorfail($id);
        $curso->idmaterias=$request->get('idmaterias');
        $curso->nombre=$request->get('nombre');
        $curso->salon_curso=$request->get('salon_curso');
        $curso->update();
        return Redirect::to('estudiantes/curso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso=curso::findOrFail($id);
        $curso->delete();
        return redirect::to('estudiantes/curso');    }
}
