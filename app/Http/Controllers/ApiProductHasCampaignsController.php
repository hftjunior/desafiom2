<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Models\ProductHasCampaign;

class ApiProductHasCampaignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productcampaigns = ProductHasCampaign::all();
        return Response::json($productcampaigns);
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
            $productcampaign = ProductHasCampaign::create($data);
        }catch(Illuminate\Database\QueryException $e){
            $array['error'] = "Falha ao criar o registro";
            return Response::json($array, 404);
        }

        return Response::json($productcampaign);
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
        $productcampaign = ProductHasCampaign::find($id);
        if($productcampaign){
            return Response::json($productcampaign);
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
        $productcampaign = ProductHasCampaign::find($id);
        if($productcampaign)
        {
            try{
                $productcampaign->product_id = $data['product_id'];
                $productcampaign->campaign_id = $data['campaign_id'];
                $productcampaign->discont = $data['discont'];
                $productcampaign->save();
            }catch(Illuminate\Database\QueryException $e){
                $array['error'] = "Falha ao atualizar o registro";
                return Response::json($array, 404);
            }
        }else{
            $array['error'] = "Registro não encontrado.";
            return Response::json($array, 404);
        }
        return Response::json($productcampaign);
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
        $productcampaign = ProductHasCampaign::find($id);
        if($productcampaign)
        {
            try{
                $productcampaign->delete();
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
