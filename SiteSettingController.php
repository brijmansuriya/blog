<?php

namespace App\Http\Controllers;

use App\Helpers\CommonHelper;
use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\imageUpload;

class SiteSettingController extends Controller
{
	use imageUpload;
	
    public function index(Request $request){
 
        $this->data['data'] = SiteSetting::first();
        $this->data['dateTableTitle'] = "Site Setting";
        return view('admin.pages.site_setting.index',$this->data);
    }

    public function update(Request $request){
		
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'site_logo'=> 'image|mimes:jpeg,png,jpg,PNG,svg|max:2048',
            'fav_icon'=> 'image|mimes:jpeg,png,jpg,PNG,svg|max:2048',
            'site_title' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first()); 
        }
		
		if($request->site_logo){
			$name = $this->imageUpload($request->site_logo,'site_setting');
			$input['site_logo'] = $name; 
		}
		
		if($request->fav_icon){
			$name = $this->imageUpload($request->fav_icon,'site_setting');
			$input['fav_icon'] = $name; 
		}
		
        $find = SiteSetting::first();
        $find->update($input);
        return redirect()->back()->with('success', 'Successfully Updated');

    }


}
