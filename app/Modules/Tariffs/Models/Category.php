<?php
namespace App\Modules\Tariffs\Models;
use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;


class Category extends Model
{

    use Notifiable, Sortable;

    protected $table = 'tariffs_categories';

    protected $fillable = ['id', 'lang', 'content', 'name', 'image', 'published'];

    public function scopeOrder($query){
        return $query->orderBy('name', 'asc');
    }





}
