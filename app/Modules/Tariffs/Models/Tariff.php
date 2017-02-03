<?php
namespace App\Modules\Tariffs\Models;

use App\Models\Model;
use App\Models\Image;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;


class Tariff extends Model
{

    use Notifiable, Sortable, Image;

    protected $table = 'tariffs';

    protected $fillable = ['id', 'lang', 'content', 'name', 'image', 'published'];

    public function scopeOrder($query){
        return $query->orderBy('name', 'asc');
    }

}
