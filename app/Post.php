<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'content', 'image', 'published_at', 'category_id', 'days', 'nights', 'price', 'flight'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['published_at'];

    public function deleteImage(){
        Storage::delete($this->image);
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    //call publish() in query builder
    public function scopePublish($query){
        return $query->where('published_at', '<=', now());
    }

    //call search() in query builder
    public function scopeSearch($query){

        $search = request()->query('search');

        if($search) {
            return $query->where('title', 'like', '%'. $search .'%')
                ->orWhere('content', 'like', '%'. $search .'%')
                ->publish()
                ->orderBy('published_at', 'desc')
                ->simplePaginate(6);
        }else{
            return $query->publish()
                ->orderBy('published_at', 'desc')
                ->simplePaginate(6);
        }
    }

    //call hot() in query builder
    public function scopeHot($query){
        return $query->where('hot', 1)
            ->search();
    }
}
