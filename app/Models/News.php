<?php declare(strict_types=1);


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'title',
        'article',
        'status_id',
        'category_id',
    ];

    public  function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(NewsStatus::class, 'status_id', 'id');
    }
}
