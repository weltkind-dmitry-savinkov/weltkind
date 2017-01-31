<?php
namespace App\Modules\Faq\Models;

use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Modules\Faq\Models\Faq
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Faq\Models\Faq order()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Model admin()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Model filtered()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Model published()
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Faq\Models\Faq sortable($defaultSortParameters = null)
 * @mixin \Eloquent
 * @property int $id
 * @property string $lang
 * @property bool $published
 * @property bool $on_main
 * @property int $priority
 * @property string $date
 * @property string $title
 * @property string $preview
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Faq\Models\Faq whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Faq\Models\Faq whereLang($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Faq\Models\Faq wherePublished($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Faq\Models\Faq whereOnMain($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Faq\Models\Faq wherePriority($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Faq\Models\Faq whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Faq\Models\Faq whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Faq\Models\Faq wherePreview($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Faq\Models\Faq whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Faq\Models\Faq whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Faq\Models\Faq whereUpdatedAt($value)
 */
class Faq extends Model
{

    use Notifiable, Sortable;

    protected $table = 'faq';

    protected $fillable = ['lang', 'priority', 'on_main', 'title', 'date', 'preview', 'content', 'published', 'on_main'];


    public function scopeOrder($query){
        return $query->orderBy('priority', 'desc')->orderBy('date', 'desc')->orderBy('created_at', 'desc');
    }


}
