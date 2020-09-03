<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Require authentication except index and show
    public function __construct()
    {
        $this->middleware('auth' ,['except'=>['index', 'show', 'search']]);
    }

    public function index()
    {
        $players = Player::paginate(15);

        return view('index')->with('players', $players);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');

        return redirect('/home');
    }

    //search player
    public function search(Request $request)
    {

        $location = $request->input('location');
        $level = $request->input('level');
        $gender = $request->input('gender');


        // $players = Player::where([
        //                 ['level', '=', $level],
        //                 ['location', 'like', '%'.$location.'%'],
        //                 ['gender', '=', $gender]])->paginate(15);

        $players = Player::query();

        if(!empty($level))
        {
          $players = $players->where('level', '=', $level);
        }

        if(!empty($location))
        {
          $players = $players->where('location', 'like', '%'.$location.'%');
        }

        if(!empty($gender))
        {
          $players = $players->where('gender', '=', $gender);
        }

        $players=$players->paginate(15);
        return view('index')->with(compact('players', 'location', 'level', 'gender'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,
      [
        'name'=>'required',
        'gender'=>'required',
        'level'=>'required',
        'age'=>'required',
        'location'=>'required'

      ]);

        $player = new Player();
        $player->user_id = Auth::id();
        $player->name = $request->input('name');
        $player->gender = $request->input('gender');
        $player->level = $request->input('level');
        $player->age = $request->input('age');
        $player->location = $request->input('location');
        $player->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $player = Player::find($id);

      return view('show')->with('player', $player);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $player = Player::find($id);

      return view('edit')->with('player', $player);
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
      $this->validate($request,
      [
        'name'=>'required',
        'gender'=>'required',
        'level'=>'required',
        'age'=>'required',
        'location'=>'required'

      ]);

      $player = Player::find($id);
      $player->user_id = Auth::id();
      $player->name = $request->input('name');
      $player->gender = $request->input('gender');
      $player->level = $request->input('level');
      $player->age = $request->input('age');
      $player->location = $request->input('location');
      $player->save();

      return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
