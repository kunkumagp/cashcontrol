<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = ['id', 'user_id', 'category_id', 'title', 'description', 'amount', 'status'];

    public function category(){
        return $this -> belongsTo(Category::class, 'category_id');
    }
}
