<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Restaurant;
use App\RestaurantImage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        abort_unless(\Gate::allows('user_access'), 403);

        $restaurants = Restaurant::all();

        return response()->json(['data' => $restaurants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $result =  Restaurant::create($request->all());
        //     request()->validate([
        //         'rest_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //    ]);

        $images = array();
        if ($files = $request->file('rest_image')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('image', $name);
                $images[] = $name;
                /*Insert your data*/
                $r_image = new RestaurantImage();
                $r_image->rest_id = $result->id;
                $r_image->name = $name;
                $r_image->save();
                /*Insert your data*/
            }
        }

        return response()->json(['message' => 'New restaurant created successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = Restaurant::find($id);
        // return $restaurant;

        return response()->json(['data' => $restaurant]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
        $restaurant->update($request->all());

        return response()->json(['message'=> 'Restaurant updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
        $restaurant->delete();

        return response()->json(['message' =>'Restaurant destroyed successfully']);
    }

    public function massDestroy(Request $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response()->json(['message'=> 'all restaurants destroyed successfully']);
    }
}
