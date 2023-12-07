<?php

namespace App\Http\Controllers;

use App\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = 'Lino';
        //dd(DB::select("SELECT * FROM actors WHERE name = '$name'"));
        //dd(DB::select("SELECT * FROM actors WHERE name = ?", [$name]));

        //dd(DB::table('actors')->get());
        //dd(DB::table('actors')->select('name','surname')->get()->where('name',$name));

        //dd(Actor::all('name','surname')->where('name',$name));

        //dd(DB::table('actors')->join('movies','actor_id','=','movies.actor_id')->get());

        return view('actors.index',['actors'=>Actor::all()->load('movies')]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name" => "required|alpha",
            "surname" => "required|alpha",
            "year" => "required",
        ],[
            "name.required" => "Il campo nome è abbligatorio",
            "name.alpha" => "Il campo nome non può essere numerico",
            "surname.required" => "Il campo cognome è abbligatorio",
            "surname.alpha" => "Il campo nome non può essere numerico",
            "year.required" => "Il campo anno è abbligatorio"
        ]);
        $actor = Actor::create($request->all());
        return redirect()->route('actors.show', $actor->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function show(Actor $actor)
    {
        //dd($actor->movies);
        //$actor = Actor::findOrFail($id);
        //return response()->json($actor->load('movies'));
        return view('actors.show',['actor'=>$actor->load('movies')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function edit(Actor $actor)
    {
        return view('actors.edit',compact('actor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actor $actor)
    {
        $this->validate($request,[
            "name" => "required|alpha",
            "surname" => "required|alpha",
            "year" => "required",
        ],[
            "name.required" => "Il campo nome è abbligatorio",
            "name.alpha" => "Il campo nome non può essere numerico",
            "surname.required" => "Il campo cognome è abbligatorio",
            "surname.alpha" => "Il campo nome non può essere numerico",
            "year.required" => "Il campo anno è abbligatorio"
        ]);
        $actor->update($request->all());
        return redirect()->route('actors.show', $actor->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actor $actor)
    {
        //$actor->movies()->delete();
        $actor->delete();
        return redirect()->route('actors.index');
    }
}
