<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meal;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($rest_id, $cat_id)
    {
        $meals = Meal::where('restaurant_id', $rest_id)->where('category_id', $cat_id)->get();
        return view('meals.index', ['meals' => $meals]);
    }
}
