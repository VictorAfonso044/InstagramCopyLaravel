<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function user()
    {
       return $this->belongsTo(User::class);
    }
    public function profileImage()
    {
       return ($this->image) ? '/storage/'. $this->image : 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fclipartart.com%2Fimages%2Flogin-background-images-clipart-1.jpg&f=1&nofb=1';
    }
    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}
