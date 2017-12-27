<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Item;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Item::paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'body' => 'required|string|min:2',
            'priority' => 'required|boolean',
            'is_done' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return $validator;
        }
        return Item::create($request->only([ 'body', 'priority', 'is_done']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Item::findOrFail($id);
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
        $validator = Validator::make($request->all(), [
            'body' => 'required|string|min:2',
            'priority' => 'required|boolean',
            'is_done' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $item = Item::findOrFail($id);
        $item->update($request->only([ 'body', 'priority', 'is_done']));
        return $item;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

    }

}
