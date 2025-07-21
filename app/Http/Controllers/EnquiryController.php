<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index(){
        $enquiries = Enquiry::latest()->paginate(20);
        return view('enquiries.index', compact('enquiries'));
    }

    public function status(Request $request, Enquiry $enquiry){
        $enquiry->update(['status' => $request->status]);
        return back()->with('success', 'Status updated successfully');
    }
}
