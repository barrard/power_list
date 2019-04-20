<?php

namespace App\Http\Controllers;

use App\ListItem;
use Illuminate\Http\Request;
use App\Http\Requests\ListItemRequest;
use App\Http\Resources\ListItemResource;

class ListItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return new ListItemResource(
            $request->user()->list_items()->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ListItemRequest $request)
    {
        $list_item = $request->user()->list_items()->create($request->all());

        return response()->json($list_item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ListItem  $list_item
     * @return \Illuminate\Http\Response
     */
    public function update(ListItemRequest $request, ListItem $list_item)
    {
        $list_item->update($request->all());

        return response()->json($list_item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ListItem  $list_item
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListItem $list_item)
    {
        $list_item->delete();
    }
}
