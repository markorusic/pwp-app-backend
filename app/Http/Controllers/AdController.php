<?php

namespace App\Http\Controllers;

use App\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public $user;
    
    public function __construct() {
        $this->user = auth()->user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Ad::with('user')->ordered()->get();
    }

    public function getByAuthUser() {
        return auth()->user()->ads()->ordered()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json(
            $this->user->ads()->create($request->all()),
            200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        return response()->json(
            $ad,
            200
        );;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        if ($ad->user_id != $this->user->id) {
            return response()->json('Permission denied.', 403);
        }
        return response()->json(
            $ad->update($request->all()),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        $canDelete = ($ad->user_id == $this->user->id) || $this->user->role == 'admin';
        if (!$canDelete) {
            return response()->json('Permission denied.', 403);
        }
        return response()->json(
            $ad->delete(),
            200
        );
    }
}
