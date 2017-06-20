<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model {

    protected $fillable = ['id', 'user_id', 'category_id', 'store_id', 'title', 'description', 'amount', 'status'];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function store() {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function bank() {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

}
