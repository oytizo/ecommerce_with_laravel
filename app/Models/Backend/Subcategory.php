<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\category;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable= [
        'catId',
        'subcatname',
        'slug',
        'des',
        'img',
        'status'

    ];
  public function cat(){
      return $this->belongsTo(category::class,'catId');
  }
}
