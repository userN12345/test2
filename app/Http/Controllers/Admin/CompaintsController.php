<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Complaint;

class CompaintsController extends Controller
{
    public function index_complaints(){
        $complaints = Complaint::orderBy('id','desc')->paginate(3);
        return view('admins.complaints.index_complaints',compact('complaints'));
    }

    public function details_complaints($id){
        $complaints = Complaint::findOrFail($id);
        return view('admins.complaints.details_complaints',compact('complaints'));
    }

    public function delete_complaints($id){
        $complaints = Complaint::findOrFail($id)->delete();
        return redirect()->back()->with('message','the compaints is deleted !!');
    }
}
