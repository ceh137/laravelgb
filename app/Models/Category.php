<?php declare(strict_types=1);


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model

{
    protected $table = 'categories';

    public function GetCategoriesAll() {
        return \DB::table($this->table)->select('*')->get();
    }
}
