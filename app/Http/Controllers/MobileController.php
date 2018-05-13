<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobile;

class MobileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mobiles = Mobile::orderBy('id', 'ASC')->paginate(10);

        return [
            'pagination'=>[
                'total'          => $mobiles->total(),
                'current_page'   => $mobiles->currentPage(),
                'per_page'       => $mobiles->perPage(),
                'last_page'      => $mobiles->lastPage(),
                'from'           => $mobiles->firstItem(),
                'to'             => $mobiles->lastItem(),
            ],
            'mobiles'=>$mobiles
        ];
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'number'=>'required',
            'user_id'=>'required'
        ]);
        Mobile::create($request->all());
        
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $this->validate($request, [
            'number'=> 'required',
            'user_id'=> 'required'
        ]);
        Mobile::find($id)->update($request->all());
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mobile = Mobile::findOrFail($id);
        $mobile -> delete();
    }
}
