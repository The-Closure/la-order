<?php

namespace App\Http\Controllers\resturant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\Meal;
use App\Models\Category;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals = Meal::all();

        return view('meals.index', ['meals' => $meals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('meals.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|min:4|max:255',
            'desc'        => 'required|string|min:15',
            'status'      => 'required|boolean',
            'featured'    => 'required|file|image',
            'price'       => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

    $meal = new Meal();
    $meal->name = $request->name;
    $meal->desc = $request->desc;
    $meal->status = $request->status;
    $meal->catigory_id = $request->catigory_id;
    $meal->name = $request->name;
    $file = $request->file('featured');

        $url = '/storage/meals/'  . $file->extension();
        Image::make($file)
            ->resize(600, 500)
            ->save(public_path($url));

        $meal->featured = $url;
        if($meal->save()) {
            request()->session()->flash('success', 'Meals was created successfully.');
        } else {
            request()->session()->flash('danger', 'Something went wrong.');
        }

        return redirect()->route('meals.show');
        }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meal = Meal::where($id);
        return view('meals.show', ['meal' => $meal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meal = Meal::find($id);
        $categories = Category::all();

        return view('meals.edit', [
            'meal' => $meal,
            'categories' => $categories,
        ]);
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
        $request->validate([
            'name'        => 'required|string|min:4|max:255',
            'desc'        => 'required|string|min:15',
            'status'      => 'required|boolean',
            'featured'    => 'required|file|image',
            'price'       => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        $meal = Meal::find($id);
    $meal->name = $request->name;
    $meal->desc = $request->desc;
    $meal->status = $request->status;
    $meal->catigory_id = $request->catigory_id;
    $meal->name = $request->name;
    $file = $request->file('featured');

        $url = '/storage/meals/'  . $file->extension();
        Image::make($file)
            ->resize(600, 500)
            ->save(public_path($url));

        $meal->featured = $url;
        if($meal->save()) {
            request()->session()->flash('success', 'Meals was update successfully.');
        } else {
            request()->session()->flash('danger', 'Something went wrong.');
        }

        return redirect()->route('meals.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meal = Meal::destroy($id);

        request()->session()->flash('danger', 'meal was Deleted successfully.');

        return redirect()->route('meals.index');
    }
}
