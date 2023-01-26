<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     */
    public function __construct(Request $request){
        dump($request->route()->getName());
    }



    public function index()
    {
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View // \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void // \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param //  int  $id
     * @return string // \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Post $id";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param //  int  $id
     * @return Application|Factory|View // \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('posts.edit', ['id'=> $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  // \Illuminate\Http\Request  $request
     * @return void // \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dump($id);
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param //  int  $id
     * @return void // \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dump(__METHOD__);
        dd($id);
    }
}
