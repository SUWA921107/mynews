<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\Profile_History;
use Carbon\Carbon;

class ProfileController extends Controller
{
     public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
      $this->validate($request, Profile::$rules);

      $profile = new Profile;
      $form = $request->all();
      


      unset($form['_token']);

      
      $profile->fill($form);
 
      $profile->save();

        return redirect('admin/profile/create');
    }

    public function edit(Request $request)
    {
        $profile = Profile::find($request->id);
        if (empty($profile)) {
            abort(404);    
        }
        
       return view('admin.profile.edit',['profile_form' => $profile]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        $profile_form = $request->all();
        
        unset($profile_form['_token']);
        $profile->fill($profile_form)->save();
        
        $profileHistory = new Profile_History;
        $profileHistory->profile_id = $profile->id;
        $profileHistory->edited_at = Carbon::now();
        $profileHistory->save();

        
        return redirect('admin/profile/');
    }
   
    public function index(Request $request)
    {
       $name = $request->name;
        if ($name != '') {
            // 検索されたら検索結果を取得する
            $profiles = Profile::where('name', $name)->get();
        } else {
            // それ以外はすべてを取得する
            $profiles = Profile::all();
        }
        return view('admin.profile.profile', ['profiles' => $profiles, 'name' => $name]);
    }
     
     public function delete(Request $request){
        $profiles=Profile::find($request->id);
        $profiles->delete();
        return redirect('admin/profile/');
    }
}
