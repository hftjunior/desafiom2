<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Models\Group;

class ApiGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        return Response::json($groups);
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
            $group = Group::create($data);
        }catch(Illuminate\Database\QueryException $e){
            $array['error'] = "Falha ao criar o registro";
            return Response::json($array, 404);
        }

        return $group;
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
        $group = Group::find($id);
        if($group){
            return Response::json($group);
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
        $group = Group::find($id);
        if($group)
        {
            try{
                $group->name = $data['name'];
                $group->campaign_id = $data['campaign_id'];
                $group->save();
            }catch(Illuminate\Database\QueryException $e){
                $array['error'] = "Falha ao atualizar o registro";
                return Response::json($array, 404);
            }
        }else{
            $array['error'] = "Registro não encontrado.";
            return Response::json($array, 404);
        }
        return Response::json($group);
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
        $group = Group::find($id);
        if($group)
        {
            try{
                $group->delete();
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
