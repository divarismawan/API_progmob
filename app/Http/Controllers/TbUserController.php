<?php

namespace App\Http\Controllers;

use App\tb_user;
use App\User as User;
use Illuminate\Http\Request;

class TbUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tb_user  $tb_user
     * @return \Illuminate\Http\Response
     */
    public function show(tb_user $tb_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tb_user  $tb_user
     * @return \Illuminate\Http\Response
     */
    public function edit(tb_user $tb_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tb_user  $tb_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tb_user $tb_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tb_user  $tb_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(tb_user $tb_user)
    {
        //
    }

    public function getNovel(Request $request){
        $user = User::find($request->user_id);

        //dd($user->favoriteNovels->all());

        return response()->json([
          'favorites' => $user->favoriteNovels,
          200
        ]);
    }
}
