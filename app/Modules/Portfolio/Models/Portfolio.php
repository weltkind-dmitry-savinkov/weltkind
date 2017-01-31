<?php
namespace App\Modules\Portfolio\Models;

use App\Models\Model;
use App\Models\Image as Img;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Modules\Portfolio\Models\Portfolio
 *
 * @property mixed $title
 * @property mixed $content
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\Portfolio\Models\Image[] $images
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\Portfolio\Models\Category[] $categories
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read mixed $image_thumb
 * @property-read mixed $image_mini
 * @property-read mixed $image_full
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Portfolio order()
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Portfolio published()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Model admin()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Model filtered()
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Portfolio sortable($defaultSortParameters = null)
 * @mixin \Eloquent
 * @property int $id
 * @property string $lang
 * @property bool $published
 * @property bool $on_main
 * @property string $date
 * @property string $url
 * @property int $priority
 * @property string $title_ru
 * @property string $title_en
 * @property string $content_ru
 * @property string $content_en
 * @property string $main_image
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Portfolio whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Portfolio whereLang($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Portfolio wherePublished($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Portfolio whereOnMain($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Portfolio whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Portfolio whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Portfolio wherePriority($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Portfolio whereTitleRu($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Portfolio whereTitleEn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Portfolio whereContentRu($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Portfolio whereContentEn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Portfolio whereMainImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Portfolio whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Portfolio whereUpdatedAt($value)
 */
class Portfolio extends Model
{

    use Notifiable, Sortable, Img;

    protected $table = 'portfolio';

    protected $guarded = array('id', 'created_at', 'updated_at', 'categories');

    protected $appends = ['title', 'content'];



    protected function addGlobalScopes()
    {


    }

    public function getTitleAttribute()
    {
        return $this->{'title_' . lang()};
    }

    public function setTitleAttribute($value)
    {
        $this->{'title_' . lang()} = $value;
    }


    public function getContentAttribute()
    {
        return $this->{'content_' . lang()};
    }

    public function setContentAttribute($value)
    {
        $this->{'content_' . lang()} = $value;
    }

    public function images()
    {
        return $this->hasMany("App\Modules\Portfolio\Models\Image", 'portfolio_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(new Category, 'portfolio_categories_relations',
            'portfolio_id', 'category_id');
    }


    public function scopeOrder($query)
    {
        return $query->orderBy('priority', 'desc')->orderBy('date', 'desc')->orderBy('created_at', 'desc');
    }


    public function scopePublished($query)
    {
        return $query->order()->where('published', 1);
    }

    public function imagePath($slug){

        $image = $this->main_image ;

        if (!$image){
            return false;
        }

        if (!is_file(public_path().'/uploads/portfolio/main/'.$image)){
            return false;
        }

        return '/uploads/portfolio/main/'.$image;
    }




}
