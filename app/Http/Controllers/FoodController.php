<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use Illuminate\Support\Facades\Session;


class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allFoods = Food::orderBy('id', 'desc')->get();
        return view('home', [
            'foods' => $allFoods
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mode = "ADD";
        return view('form', [
            "mode" => $mode
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:foods|max:255',
            'description' => 'required',
            'image' => 'required'
        ]);
        if ($validated) {
            $title = $request->title;
            $description = $request->description;
            $image = $request->file("image");
            $path = null;
            if ($image !== null) {
                $path = $image->store('images', 'public');
            }
            Food::create([
                "title" => $title,
                "description" => $description,
                "image_url" => $path
            ]);
            Session::flash('status', 'Food is added successfully!');
            return redirect()->route('foods.index');    
        } else {
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $food = Food::where('id', $id)->firstOrFail();
        
        return view('readmore', [
            'food' => $food
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mode = "EDIT";
        $food = Food::where('id', $id)->firstOrFail();
        return view('form', [
            'foods' => $food,
           'mode' => $mode
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        if ($validated) {
            $title = $request->title;
            $description = $request->description;
            Food::where('id', $id)->update([
                "title" => $title,
                "description" => $description
            ]);
            Session::flash('status', 'Event is edited successfully!');
            return redirect()->route('foods.index');
        } else {
            return back()->withInput();
        }
    }



    public function destroy(string $id)
    {
        Food::where('id', $id)->delete();
        return redirect()->route('foods.index');
    }
}
