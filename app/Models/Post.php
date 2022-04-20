<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];


  

    public static function boot(){
        parent::boot();

        self::creating(function($post){
            $post->user()->associate(auth()->user()->id);
            $post->category()->associate(request()->category);
        });

        self::updating(function($post){
            $post->category()->associate(request()->category);
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getTitleAttribute($value){
        return ucfirst($value);
    }

    public function comments(){
        return $this->hasMany(Comment::class );
    }
}
