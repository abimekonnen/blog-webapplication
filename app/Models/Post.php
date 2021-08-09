<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $date =[
        'published_at',
    ];
    protected $fillable =[
        'title' ,
        'discription',
        'content' ,
        'image',
        'published_at',
        'category_id',
        'user_id'
    ];

    // delete post image frome storage
    public function deleteImage(){
        Storage::delete($this->image);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //cheak if post has tag
    public function hasTag($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query){
        return $query->where('published_at', '<=', now());
    }

    public function scopeSearch($query){
        $search = request()->query('search');
        if(!$search){
           return $query->Published();
        }else{
            return $query->Published()->where('title','TIKE',"%{$search}%");
           
        }
    }
  
}
