<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model {

    protected $fillable = ['id', 'user_id', 'title', 'type', 'acc_no', 'acc_total', 'status'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
