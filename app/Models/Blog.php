<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'headline', 'content', 'category', 'product_id', 'image', 'author_id', 'views'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function product()
    {
        return $this->product_id != null ? $this->belongsTo(Product::class, 'product_id') : false;
    }
}
