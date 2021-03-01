<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;

class ProfilesController extends Controller
{

    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        $postsCount = Cache::remember('count.posts.'.$user->id,now()->addSeconds(30),function () use ($user){
            return $user->posts->count();
        });
        $followersCount = Cache::remember('count.followers.'.$user->id,now()->addSeconds(30),function () use ($user){
            return $user->profile->followers->count();
        });

        $followingCount =Cache::remember('count.following.'.$user->id,now()->addSeconds(30),function () use ($user){
            return $user->following->count();
        });

        return view('profiles.index',compact('user','follows', 'postsCount', 'followersCount', 'followingCount'));
    }
    public function edit(User $user)
    {
        $this->authorize('update',$user->profile);
        return view('profiles.edit',compact('user'));

    }
    public function update(Request $request, User $user)
    {
        $this->authorize('update',$user->profile);

        $data = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'url' => ['url'],
            'image' => '',
        ]);
        if($request->image){
            $imagePath = $request->image->store('profile','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
            $imgArray = ['image' => $imagePath];
        }
        auth()->user()->profile->update(array_merge($data, $imgArray ?? []));
        return redirect("/profile/{$user->id}");
    }
}
