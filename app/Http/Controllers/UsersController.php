<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
// use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UsersController extends Controller
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->only(['firstname', 'lastname', 'email', 'company', 'country']));
        return response()->json(['user' => auth()->user()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function changeAvatar(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->hasFile('file')) {
            
            $file = $request->file('file');
            $name = 'avatar'.$id.'.jpg';

            if (\Storage::exists('public/'.$name)) {
                \Storage::delete('public/'.$name);
            }

            $file->storeAs('public', $name);
            $user->avatar_url = 'http://myapp.local/storage/'. $name .'';
            $user->save();
        }

        return response()->json(['user' => auth()->user()]);
    }
}
