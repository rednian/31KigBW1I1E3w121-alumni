<?php

namespace Alumni\Http\Controllers\Admin;

use Alumni\Partners;
use Illuminate\Http\Request;
use Alumni\Http\Controllers\Controller;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partners::paginate(10);

        return view('admin.account.partner',compact('partners'));
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

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|min:3|max:255',
            'logo'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'email'=>'nullable|email',
            'telephone_number'=>'nullable|min:3|max:9',
            'mobile_number'=>'nullable|min:3|max:15',
            'address'=>'required|min:3|max:255',
        ]);

        if ($request->hasFile('logo')) {

            $date = Carbon::now();
            $image = $request->file('logo');
            $image_extension = $image->clientExtension();

            if ($image->isValid()) {

                //rename the image file to username and date uploaded
                $image_name = $request['name'] . '_' . $date->format('m-d-Y') . '.' . $image_extension;
                $image_location = 'public/partner';

                $request->image->storeAs($image_location, $image_name);

                $data['logo'] = '/partner/' . $image_name;
            }

        } else {
            $data['logo'] = 'default/default.png';
        }



        $partner = Partners::create($data);

        return redirect()->back()->with('success',$partner. ' Successfully created!');
    }


    public function show($id)
    {
        $partners  = Partners::find($id);

        return view('partners.show', compact('partners'));
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
}
