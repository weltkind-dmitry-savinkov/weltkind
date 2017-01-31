<?php
namespace App\Modules\Portfolio\Models;
use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Modules\Portfolio\Models\Category
 *
 * @property mixed $title
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\Portfolio\Models\Portfolio[] $works
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Category order()
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Category published()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Model admin()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Model filtered()
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Category sortable($defaultSortParameters = null)
 * @mixin \Eloquent
 * @property int $id
 * @property string $lang
 * @property int $published
 * @property int $priority
 * @property bool $only_in_list
 * @property string $title_ru
 * @property string $title_en
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Category whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Category whereLang($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Category wherePublished($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Category wherePriority($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Category whereOnlyInList($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Category whereTitleRu($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Category whereTitleEn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Category whereUpdatedAt($value)
 */
class Category extends Model
{

    use Notifiable, Sortable;

    protected $table = 'portfolio_categories';


    protected $appends = ['title'];


    protected function addGlobalScopes()
    {

    }

    public function getTitleAttribute()
    {
        return $this->{'title_'.lang()};
    }

    public function setTitleAttribute($value)
    {
        $this->{'title_'.lang()} = $value;
    }

    public function scopeOrder($query){
        return $query->orderBy('priority', 'desc')->orderBy('title_'.lang(), 'asc')->orderBy('created_at', 'desc');
    }

    public function works()
    {
        return $this->belongsToMany(new Portfolio, 'portfolio_categories_relations',
            'category_id', 'portfolio_id');
    }

    public function scopePublished($query)
    {
        return $query->order()->where('published', 1);
    }

    public static function getSelect(){


        $keyed = collect();

        self::admin()->get()->mapWithKeys(function ($item) use ($keyed) {
            $keyed[$item->id] = $item->title;
        });

        return $keyed;

    }




}
