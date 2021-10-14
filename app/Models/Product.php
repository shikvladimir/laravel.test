<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price','active','photo'];

    public function getPagePhotoAttribute(){
        if (Storage::exists($this->attributes['photo'])){
            return(Storage::url($this->attributes['photo']));
        }
        return 'https://www.fonstola.ru/download.php?file=201302/1440x900/fonstola.ru-88175.jpg';
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

}
