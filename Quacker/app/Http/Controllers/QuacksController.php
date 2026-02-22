<?php

namespace App\Http\Controllers;

use App\Models\Quack;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuacksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('quacks.index', [
        'quacks' => Quack::get()->sortByDesc('created_at')
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_id = User::inRandomOrder()->first()->id;
        return view('quacks.create', [
            'user_id' => $user_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Quack::create(request()->all());
        return redirect('/quacks');
    }

    /**
     * Display the specified resource.
     */
    public function show(Quack $quack)
    {
        return view('quacks.show', [
        'quack' => $quack
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quack $quack)
    {
        return view('quacks.edit',[
        'quack' => $quack
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quack $quack)
    {
        $quack->update(request()->all());
        return redirect('/quacks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Quack::destroy($id);
        return redirect('/quacks');
    }

    public function quav(Quack $quack) {
        $quack->quavs()->attach(Auth::user()->id);
        return redirect('/quacks');
    }

    public function dequav(Quack $quack) {
        $quack->quavs()->detach(Auth::user()->id);
        return redirect('/quacks');
    }

    public function requav(Quack $quack) {
        $quack->requacks()->attach(Auth::user()->id);
        return redirect('/quacks');
    }
}
