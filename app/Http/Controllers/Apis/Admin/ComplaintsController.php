<?php

namespace App\Http\Controllers\Apis\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Complaint;


class ComplaintsController extends Controller
{
    public function index_complaints(){
        $complaints = Complaint::all();
        return response()->json([$complaints],200);
    }

    public function details_complaints($id){
        $complaints = Complaint::find($id);
        if(!$complaints){
            return response()->json(['the Complaints is not fount !!'],404);
        }
        return response()->json([$complaints],404);
    }

    public function delete_complaints($id){
        $complaints = Complaint::find($id);
        if(!$complaints){
            return response()->json(['the complaints is not fount !!'],404);
        }
        $complaints->delete();
        return response()->json(['the complaints is deleted !!'],200);
    }
}
