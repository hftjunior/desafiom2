<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Models\City;

class ApiCitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return Response::json($cities);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $array = ['error' => ''];
        $data = $request->all();
        try{
            $city = City::create($data);
        }catch(Illuminate\Database\QueryException $e){
            $array['error'] = "Falha ao criar o registro";
            return Response::json($array, 404);
        }

        return Response::json($city);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $array = ['error' => ''];
        $city = City::find($id);
        if($city){
            return Response::json($city);
        }else{
            $array['error'] = 'Registro não encontrado';
            return Response::json($array, 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $array = ['error' => ""];
        $data = $request->all();
        $city = City::find($id);
        if($city)
        {
            try{
                $city->name = $data['name'];
                $city->group_id = $data['group_id'];
                $city->save();
            }catch(Illuminate\Database\QueryException $e){
                $array['error'] = "Falha ao atualizar o registro";
                return Response::json($array, 404);
            }
        }else{
            $array['error'] = "Registro não encontrado.";
            return Response::json($array, 404);
        }
        return Response::json($city);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $array = ['error' => ""];
        $city = City::find($id);
        if($city)
        {
            try{
                $city->delete();
            }catch(Illuminate\Database\QueryException $e){
                $array['error'] = "Falha ao atualizar o registro";
                return Response::json($array, 404);
            }
        }else{
            $array['error'] = "Registro não encontrado.";
            return Response::json($array, 404);
        }
        $array['message'] = "Registro apagado";
        return Response::json($array, 200);
    }
}
