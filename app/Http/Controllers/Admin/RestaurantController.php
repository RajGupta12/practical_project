<?php

namespace App\Http\Controllers\Admin;

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
        foreach($restaurants as $key => $value){
            $value->images  = RestaurantImage::where('rest_id',$value->id)->get();
        }

        return view('admin.restaurant.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.restaurant.create');
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

            $images=array();
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

            return redirect()->route('admin.restaurant.index');
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
        $restaurant->images  = RestaurantImage::where('rest_id',$restaurant->id)->get();
        return view('admin.restaurant.shows',compact('restaurant'));
        //
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
        $restaurant = Restaurant::find($id);
        $restaurant->images = RestaurantImage::where('rest_id',$restaurant->id)->get();
        // return $restaurant;
        return view('admin.restaurant.edit', compact('restaurant'));
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

        return redirect()->route('admin.restaurant.index');
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

        return back();
    }

    public function update_image(Request $request){
        if ($files = $request->file('rest_image')) {
            $name = $files->getClientOriginalName();
            $files->move('image', $name);
            $images[] = $name;
            if($request->img_id){
                $r_image = RestaurantImage::find( $request->img_id);
            }else{
                $r_image = new RestaurantImage;
                $r_image->rest_id = $request->rest_id;
            }
            $r_image->name = $name;
            $r_image->save();
        }
        return redirect()->route('admin.restaurant.index');

    }

    public function massDestroy(Request $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
