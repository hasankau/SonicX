<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Auth;
use View;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function create(Request $request){
        $web = new Website;
        $web->name = $request->post('name');
        $web->url = $request->post('url');
        $web->company_name = $request->post('company_name');
        $web->user_id = Auth::user()->id;
        $web->status = 'Pending';
        $web->save();
    
        return redirect('dashboard');

    }

    public function index(){
        $web = Website::where('user_id', '=', Auth::user()->id)->get()->toArray();
        return View::make('partials.websites_table', compact('web'));
    }

    public function index_lg(){
        $web = Website::where('user_id', '=', Auth::user()->id)->get()->toArray();
        return View::make('my_websites', compact('web'));
    }

    public function weblist(){
        $web = Website::where('user_id', '=', Auth::user()->id)->get()->toArray();
        return View::make('ping_test', compact('web'));
    }

    public function securityscanweblist(){
        $web = Website::where('user_id', '=', Auth::user()->id)->get()->toArray();
        return View::make('nmap_security_scan', compact('web'));
    }
    
    public function dashboard(){
        $webcount = Website::where('user_id', '=', Auth::user()->id)->count()+0;
        $scannedwebcount = Website::where('status', '=', 'Scanned')->where('user_id', '=', Auth::user()->id)->count()+0;
        $pendingwebcount = Website::where('status', '=', 'Pending')->where('user_id', '=', Auth::user()->id)->count()+0;

        return View::make('dashboard', 
        compact('webcount', 'scannedwebcount', 'pendingwebcount'))
        ;
    }

    public function delete(Request $request){
        Website::where('id', '=', $request->get('id'))->delete();

        return redirect('dashboard');
    }


    public function edit(Request $request){
        $web = Website::where('id', '=', $request->get('id'));
        $web->name = $request->post('name');
        $web->url = $request->post('url');
        $web->company_name = $request->post('company_name');
        $web->user_id = Auth::user()->id;
        $web->status = 'Pending';
        $web->save();
    
        return redirect('dashboard');

    }

}
