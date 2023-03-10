<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = user::all();
        return view('user.index')->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('user.create');
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
            'username' => ['required', 'string', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'telpon'=>['required','numeric'],
            'password' => ['required', 'string', 'min:8'],
            'level' => ['required','string'],
       ]);
        try{
            $user = new User;
            $user->username = $request->username;
            $user->name= $request->name;
            $user->email = $request->email;
            $user->telpon=$request->telpon;
            $user->password = Hash::make($request->password);
            $user->level= $request->level;
            $user->save();
       }
        catch(\Exception $e ){
            return redirect()->back()->withErrors(['User gagal disimpan']);
       }
        return redirect('user')->with('status','User Berhasil ditambahkan');
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
    public function edit($id)
    {
        $user =  User::find($id);
        return view('user.edit')->with('user',$user);
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
        $request->validate([
            'username' => ['required', 'string', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'telpon'=>['required','string'],
            'password' => ['required', 'string', 'min:8'],
            'level' => ['required','string'],
        ]);

        try{
            $user = User::find($id);
            $user->name = $request->name;
            $user->username = $request->username;
            $user->telpon = $request->telpon;
            $user->email = $request->email;
            if($request->password !=""){
                $user->password = Hash::make($request->password);
            }
            $user->level= $request->level;
            $user->save();
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['User gagal diperbarui']);
        }
        return redirect('user')->with('status', 'User Berhasil diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $user = User::findOrFail($id);
            $user->delete();
        }
        catch(\Exception $e ){
            return redirect()->back()->withErrors(['User gagal dihapus']);
        }
        return redirect()->back()->with('status','User Berhasil dihapus');
    }
}
