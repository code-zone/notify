<?php

namespace App\Http\Controllers;

use Storage;
use App\Meal;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MealsController extends Controller
{
    /**
     * Meals entity object.
     *
     * @var string
     **/
    protected $meals;

    /**
     * Create a controller instance.
     *
     * @param \App\Studnt $meal
     **/
    public function __construct(Meal $meal)
    {
        $this->meals = $meal;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meals = $this->meals->orderBy('created_at', 'DESC')->paginate();

        return view('meals.index', compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|string|min:3', 'price' => 'required|numeric|min:0', 'image' => ['required', Rule::dimensions()->maxWidth(1000)->maxHeight(500)],
            'category' => 'required', 'details' => 'required|string|max:100',
            ]);
        $meal = $this->meals->create($request->all());
        if ($request->hasFile('image')) {
            $image = $request->image;
            $name = md5($image->getClientOriginalName().time()).'.'.$image->extension();
            $image->move(public_path('images'), $name);
            $meal->update(['image'=> $name]);
        }

        return redirect()->route('meals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Meal $meal
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        return view('meals.modals.availability', compact('meal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Meal $meal
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Meal $meal)
    {
         return view('meals.edit', compact('meal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Meal                $meal
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        $this->validate($request, ['name' => 'required|string|min:3', 'price' => 'required|numeric|min:0', 'image' => [Rule::dimensions()->maxWidth(1000)->maxHeight(500)],
            'category' => 'required', 'details' => 'required|string|max:100',
            ]);
        $meal->update($request->input());
        if ($request->hasFile('image')) {
            $image = $request->image;
            $name = md5($image->getClientOriginalName().time()).'.'.$image->extension();
            $image->move(public_path('images'), $name);
            $meal->update(['image'=> $name]);
        }

        return redirect()->route('meals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Meal $meal
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Meal                $meal
     *
     * @return \Illuminate\Http\Response
     */
    public function availability(Request $request, Meal $meal)
    {
        $meal->update(['available' => $request->has('available')]);

        return back();
    }
}
