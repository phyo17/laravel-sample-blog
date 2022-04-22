<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=['post_title','post_category_id','post_author','post_image','post_content','post_date','post_status'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category','post_category_id','id');
    }
}
