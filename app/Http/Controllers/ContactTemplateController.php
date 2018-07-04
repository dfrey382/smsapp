<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactTemplate;

class ContactTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = ContactTemplate::get();

        return view('contact.index',['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data = $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:contact_templates',
            'type' => 'nullable'
        ]);

         $data['type'] =isset($data['type'])? !ContactTemplate::GROUP :ContactTemplate::GROUP;

         ContactTemplate::create($data);

         return redirect()->route('contact.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = ContactTemplate::findOrFail($id);

        return view('contact.show',['contact' =>$contact]);
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
          $data = $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:contact_templates',
        ]);

        $template = ContactTemplate::find($id);

        $template->update($data);

        return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        ContactTemplate::find($id)->delete();

        return redirect()->route('contact.index');
    }
}
