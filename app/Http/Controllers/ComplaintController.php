<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Note;
use App\Models\Complain;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function __construct()
    {
        $this->statuses = [
            'Open' => 'Open',
            'Paused' => 'Paused',
            'Pending' => 'Pending',
            'Closed' => 'Closed'
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complains = Complain::with('vehicle')->orderBy('created_at', 'DESC')->get();
        return view('workorder.index', compact('complains'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statuses = $this->statuses;
        $complain = Complain::with('files', 'vehicle','notes')->find($id);
        return view('vehicle.complain-details', compact('complain', 'statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = [
            'note' => $request->notes,
            'complain_id'=>$id
        ];
  
        $complain = Note::create($data);
        if ($request->hasfile('file')) {
            foreach ($request->file('file') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('files'), $name);
                $file = new File();
                $file->filenames = $name;
                $file->vehicle_id = $request->vehicle_id;
                $file->complain_id = $id;
                $file->save();
            }
        }
        return back()->with('success', 'Complain  is updated Successfully');
    }
    public function statusUpdate(Request $request, $id)
    {
        $data = [
            'status' => $request->status
        ];
        $complain = Complain::where('id', $id)->update($data);
        return back()->with('success', 'Complain  is updated Successfully');
    }
    public function noteUpdate(Request $request, $id)
    {
        $data = [
            'note'=>$request->note,
        ];
        $note = Note::where('id',$id)->update($data);
        return back()->with('success', 'Complain  is updated Successfully');

    }
}
