<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->roles = [

            'Admin' => 'Admin',
            'Manager' => 'Manager',
            'Receptionist' => 'Receptionist',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
            $search = $_GET['keyword'];
            $users = User::where(function ($query) use ($search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })->orderBy('id', 'DESC')->paginate(10);
        } else {
            $users = User::where('status','!=','Deleted')->orderBy('id', 'DESC')->paginate(10);
        }

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roles;
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required',
            'type' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
            'password' => Hash::make($request->password),
            'encrypted_pasword' => Crypt::encryptString($request->password),
        ]);
        return redirect(route('manage.users'))->with('success', 'New ' . $request->type . ' Has Been Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = $this->roles;
        $user = User::find($id);
        return view('users.edit', compact('user', 'roles'));
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
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'type' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type
        ];
        // if($request->password){
        //     $data['password'] = Hash::make($request->password);
        //     $data['encrypted_pasword'] = Crypt::encryptString($request->password);
        // }
        $user = User::where('id', $id)->update($data);
        return redirect(route('manage.users'))->with('success', $request->name . '\'s record Has Been Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = [
            'status' => 'Deleted',
        ];
        $user = User::where('id', $id)->update($data);
        return redirect(route('manage.users'))->with('success', ' Record Has Been deleted Successfully.');
    }
}
