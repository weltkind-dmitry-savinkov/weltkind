<?php
namespace App\Modules\Characters\Models;

use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;


class Character extends Model
{

    use Notifiable, Sortable;

    protected $table = 'characters';

    protected $fillable = ['id', 'lang', 'content', 'name', 'image', 'published'];

    public function scopeOrder($query){
        return $query->orderBy('id', 'desc');
    }

}
