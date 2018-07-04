<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MessageLog;
use App\ContactTemplate;
use App\MessageTemplate;
class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = MessageLog::all();
        $recipients = ContactTemplate::all();
        $messagetemplates = MessageTemplate::all();

        return view('sms.index',['messages' => $messages,'recipients'=>$recipients,'messagetemplates' => $messagetemplates]);
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
        $data = $request->validate(
            [
                'recepient'=> 'required',
                'message'=> 'required',
                'select' => 'nullable'
             ]);

        if($data['select']){
            $this->sendGroupMessage($request);
        } else{
            $this->sendInvidualSMS($request);
        }

        dd($data);
        $data = MessageLog::create($data);

        return view('sms.index',['messages' => $messages]);
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

    public function dowload()
    {
        dd('download here');
    }


    public function sendGroupMessage($request)
    {

        return;
    }
}
