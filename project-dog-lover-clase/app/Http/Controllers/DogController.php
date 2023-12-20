<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $dogs = User::find($user_id)->dogs;
        return view('dog.search', [
            'dogs' => $dogs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dog.create', ['dog' => null]);
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

            'name' => 'required|regex:/^([A-Za-zÑñ\s]+[áéíóú]?[A-Za-z]*)$/iu|between:3,50',
            'race' => 'required',
            'weight' => 'required|between:1,3',
            'birth_date' => 'required|date',
            'height' => 'required|integer|digits_between:1,3|between:5,150',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('storage/dogs/'), $imageName);

        $request->user()->dogs()->create([
            'name' => $request->name,
            'sex' => $request->sex,
            'race' => $request->race,
            'birth_date' => $request->birth_date,
            'weight' => $request->weight,
            'height' => $request->height,
            'image' => $imageName
        ]);

        return redirect()->route('dog.index');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dog $dog)
    {
        return view('dog.edit', ['dog' => $dog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dog $dog)
    {
        $request->validate([

            'name' => 'required|regex:/^([A-Za-zÑñ\s]+[áéíóú]?[A-Za-z]*)$/iu|between:3,50',
            'race' => 'required',
            'weight' => 'required|between:1,3',
            'birth_date' => 'required|date',
            'height' => 'required|integer|digits_between:1,3|between:5,150',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('storage/dogs/'), $imageName);

        $dog->update([
            'name' => $request->name,
            'sex' => $request->sex,
            'race' => $request->race,
            'birth_date' => $request->birth_date,
            'weight' => $request->weight,
            'height' => $request->height,
            'image' => $imageName
        ]);

        return redirect()->route('dog.edit', $dog);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dog $dog)
    {
        $dog->delete();

        return back();
    }
}
