<?php
namespace App\Modules\Clients\Models;

use App\Models\Model;
use App\Models\Image;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Modules\Clients\Models\Client
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read mixed $image_thumb
 * @property-read mixed $image_mini
 * @property-read mixed $image_full
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Clients\Models\Client order()
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Clients\Models\Client published()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Model admin()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Model filtered()
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Clients\Models\Client sortable($defaultSortParameters = null)
 * @mixin \Eloquent
 * @property int $id
 * @property string $lang
 * @property int $priority
 * @property bool $published
 * @property string $date
 * @property string $title
 * @property string $url
 * @property string $image
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Clients\Models\Client whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Clients\Models\Client whereLang($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Clients\Models\Client wherePriority($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Clients\Models\Client wherePublished($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Clients\Models\Client whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Clients\Models\Client whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Clients\Models\Client whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Clients\Models\Client whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Clients\Models\Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Clients\Models\Client whereUpdatedAt($value)
 */
class Client extends Model
{

    use Notifiable, Sortable, Image;

    public function scopeOrder($query){
        return $query->orderBy('priority', 'desc')->orderBy('date', 'desc');
    }

    public function scopePublished($query){
        return $query->order()->where('published', 1);
    }





}
