<?php
namespace App\Modules\Reviews\Models;

use App\Models\Model;
use App\Models\Image;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Modules\Reviews\Models\Review
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read mixed $image_thumb
 * @property-read mixed $image_mini
 * @property-read mixed $image_full
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Reviews\Models\Review order()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Model admin()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Model filtered()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Model published()
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Reviews\Models\Review sortable($defaultSortParameters = null)
 * @mixin \Eloquent
 * @property int $id
 * @property string $lang
 * @property int $priority
 * @property bool $published
 * @property string $date
 * @property string $title
 * @property string $image
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Reviews\Models\Review whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Reviews\Models\Review whereLang($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Reviews\Models\Review wherePriority($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Reviews\Models\Review wherePublished($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Reviews\Models\Review whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Reviews\Models\Review whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Reviews\Models\Review whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Reviews\Models\Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Reviews\Models\Review whereUpdatedAt($value)
 */
class Review extends Model
{

    use Notifiable, Sortable, Image;


    public function imagePrefixPath(){
        return '/uploads/reviews/';
    }


    public function scopeOrder($query){
        return $query->orderBy('priority', 'asc')->orderBy('date', 'desc')->orderBy('created_at', 'desc');
    }


}
