<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeBanner extends Model
{
    protected $fillable = ['title', 'sub_title', 'link', 'background', 'button_text', 'button_link'];
}
