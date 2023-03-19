<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class HomeController extends Controller
{
    public function index()
    {
        return view('layouts.home');
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'service' => 'required',
            'message' => 'required',
        ],
        [
            "name.required" => "Please input your name"
        ]
    
    );
        
        
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['service'] = $request->service;
        $data['message'] = $request->message;

        
        Appointment::create($data);
        Alert::success('Success', 'Your appoinment has been successfully submitted!');
        return redirect()->route('home');


    }
   
}
