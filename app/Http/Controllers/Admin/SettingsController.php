<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Settings;
use App\Models\Setting_site;

class SettingsController extends Controller
{

    public function settings(){
        $settings = Setting_site::first();
        return view('admins.settings.settings',compact('settings'));
    }

    public function update_settings(){
        $settings = Setting_site::first();
        return view('admins.settings.update_settings',compact('settings'));
    }

    public function update_settings_store(Settings $req, $id){
        $settings = Setting_site::findOrFail($id);
        $settings->update($req->all());
        return redirect()->route('settings')->with('message','The Field Is Updated');
    }
}
