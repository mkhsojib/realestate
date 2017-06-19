<?php

namespace App\Http\Controllers;

use App\SiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SiteSettingsController extends Controller
{
    public function index(SiteSettings $siteSettings)
    {
        $siteSettings = $siteSettings->all();
        return view('admin/sitesettings/index', compact('siteSettings'));
    }


    public function store(Request $request)
    {
        foreach (array_except($request->toArray(), ['_token', 'submit']) as $key => $req) {
            $siteSettingsUpdate = SiteSettings::where('name_setting', $key)->first();

            if($siteSettingsUpdate != NULL){
                if(SiteSettings::all()->where('type', '!=', 2)){
                    $siteSettingsUpdate->fill(['value' => $req])->save();
                }else{
                    $file_name = uploadImage($req, 'public/banner/', '1600', '500', base_path().'/public/banner/'.$siteSettingsUpdate->value);

                    if($file_name){
                        $siteSettingsUpdate->fill(['value' => $file_name])->save();
                    }
                }
            }
        }


        return Redirect::back()->withFlashMessage('تم تعديل البيانات بنجاح');
    }
}
