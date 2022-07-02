<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use Illuminate\Http\Request;

class DealerController extends Controller
{
    public function __construct()
   {
      $this->middleware(['auth']);
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dealers = Dealer::where('status','Active')->get();
        return view('dealers.index',compact('dealers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dealers.create');
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
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
            
         ]);
       
         $dealer = new Dealer();
         $dealer->name = $request->name;
         $dealer->phone = $request->phone;
         $dealer->email = $request->email;
         $dealer->address = $request->address;
         $dealer->save();
         return redirect(route('dealer.index'))->with('success', 'Dealer  is  Added Successfully');
    
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
        $dealer = Dealer::findorFail($id);
        return view('dealers.edit',compact('dealer'));

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
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
            
         ]);
         $data  = [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
         ]; 
         $recs  = Dealer::where('id',$id)->update($data);
        return redirect(route('dealer.index'))->with('success', 'Dealer  is  Updated Successfully');

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
            'status'=>'Deleted',
        ];
        $recs = Dealer::where('id',$id)->update($data);
        return redirect(route('dealer.index'))->with('success', 'Dealer  is  Deleted Successfully');

    }
}
