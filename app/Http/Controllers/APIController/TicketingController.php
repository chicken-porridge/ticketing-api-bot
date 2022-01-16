<?php

namespace App\Http\Controllers\APIContoller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticketing;

class TicketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticketings = Ticketing::get()->toJson(JSON_PRETTY_PRINT);
        return response($ticketings, 200);
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
        $ticketing = new Ticketing;
        $ticketing->id = $request->id;
        $ticketing->instance_id = $request->instance_id;
        $ticketing->technician_id = $request->technician_id;
        $ticketing->date_created = $request->date_created;
        $ticketing->date_completed = $request->date_completed;
        $ticketing->no_ticketing = $request->no_ticketing;
        $ticketing->component_id = $request->component_id;
        $ticketing->problem = $request->problem;
        $ticketing->solving = $request->solving;
        $ticketing->status = $request->status;
        $ticketing->save();

        return response()->json([
            "message" => "Ticketing record created"
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Ticketing::where('id', $id)->exists()) {
            $ticketing = Ticketing::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($ticketing, 200);
        } else {
            return response()->json([
                "message" => "Ticketing not found"
            ], 404);
        }
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
        if (Ticketing::where('id', $id)->exists()) {
            $ticketing = Ticketing::find($id);
            // dd($request->name);
            $ticketing->id = is_null($request->id) ? $ticketing->id : $request->id;
            $ticketing->instance_id = is_null($request->instance_id) ? $ticketing->instance_id : $request->instance_id;
            $ticketing->technician_id = is_null($request->technician_id) ? $ticketing->technician_id : $request->technician_id;
            $ticketing->date_created = is_null($request->date_created) ? $ticketing->date_created : $request->date_created;
            $ticketing->date_complete = is_null($request->date_complete) ? $ticketing->date_complete : $request->date_complete;
            $ticketing->no_ticketing = is_null($request->no_ticketing) ? $ticketing->no_ticketing : $request->no_ticketing;
            $ticketing->component_id = is_null($request->component_id) ? $ticketing->component_id : $request->component_id;
            $ticketing->problem = is_null($request->problem) ? $ticketing->problem : $request->problem;
            $ticketing->solving = is_null($request->solving) ? $ticketing->solving : $request->solving;
            $ticketing->status = is_null($request->status) ? $ticketing->status : $request->status;
            $ticketing->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Ticketing not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Ticketing::where('id', $id)->exists()) {
            $ticketing = Ticketing::find($id);
            $ticketing->delete();

            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Ticketing not found"
            ], 404);
        }
    }
}