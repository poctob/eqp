<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;

class ConfigController extends Controller
{
    protected function getRepository() {return null;}
    protected function getValidator() {return null;}

    public function list()
    {
       return view('config');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repository = $this->getRepository();
        return $repository->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->getValidator();
        
        if( $validator->validate($request->all()))
        {          
             $repository = $this->getRepository();
             $entity = $repository->saveFromArray($request->all());
             if($entity)
             {
                 return $entity;
             }
        }
        else
        {
            return response()->json($validator->getErrors(),412);            
        }

        return response()->json(['Status' => 'Something went wrong'], 500);        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $repository = $this->getRepository();
        return $repository->getById($id);
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
        $validator = $this->getValidator();

        if( $validator->validate($request->all()))
        {          
             $repository = $this->getRepository();
             if($repository->updateFromArray($request->all(), $id))
             {
                 return $repository->getById($id);
             }
        }
        else
        {
            return response()->json($validator->getErrors(),412);            
        }

        return response()->json(['Status' => 'Something went wrong'], 500); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $repository = $this->getRepository();

        if($repository->delete($id))
        {
            return response()->json(['Status' => 'Success'], 200);
        }

        return response()->json(['Status' => 'Something went wrong'], 500); 
    }
}
