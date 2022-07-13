<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use App\Models\OrderedPart;
use App\Models\PartOrders;
use App\Models\VehicleRegistration;
use Illuminate\Http\Request;

class PartOrdersController extends Controller
{

    public function index()
    {
        $partsOrders = PartOrders::with('vehicle','parts')->get();
       
        return view('parts.index', compact('partsOrders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dealers = Dealer::where('status', 'Active')->get();
        $vehicles  = VehicleRegistration::all();
        return view('parts.create', compact('dealers', 'vehicles'));
    }

    public function store(Request $request)
    {
        $part_orders = new PartOrders();
        $part_orders->billing_no = $request->billing_no;
        $part_orders->customer_name = $request->customer_name;
        $part_orders->vehicle_id  = $request->vehicle_id;
        $part_orders->save();
        if ($part_orders) {
            $id = $part_orders->id;
            foreach ($request->dealer_id as $key => $value) {
                $save_data[] = [
                    'dealer_id' => $value,
                    'order_id' => $id,
                    'product_name' => $request->product_name[$key],
                    'price' => $request->qty[$key],
                    'quantity' => $request->price[$key],
                ];
            }
            $recs = OrderedPart::insert($save_data);
        }
        return back()->with('success', 'Part Order is successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details = PartOrders::with('vehicle','parts')->find($id);
        return view('parts.details', compact('details'));
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
        //
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
    public function getnewRow(Request $request)
    {
        $id = $request->row_id;

        $ids = $id + 1;
        $rowid = 'row_id_' . $ids;
        $dealers = Dealer::where('status', 'Active')->get();
        $html = view('parts.new')->with(compact('id', 'ids', 'rowid', 'dealers'))->render();
        return response()->json(['success' => true, 'html' => $html]);
    }
}
