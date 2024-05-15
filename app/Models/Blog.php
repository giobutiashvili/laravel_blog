<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public function BlogImages(){
        
        return $this->hasMany(BlogImage::class);

    }
    public function Category(){
        
        return $this->belongsTo(Category::class);
    }
    public function Slugs(){
        
        return $this->belongsToMany(Slug::class);
    }
}
