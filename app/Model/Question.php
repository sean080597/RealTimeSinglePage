<?php

namespace App\Model;

use App\User;
use App\Model\Reply;
use App\Model\Category;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title', 'slug', 'body', 'category_id', 'user_id'
    ];

    //param is slug now, not id
    public function getRouteKeyName()
    {
        return 'slug';
    }

    //to add more attribute "path" of question when getting api
    public function getPathAttribute()
    {
        return asset("api/question/$this->slug");
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
