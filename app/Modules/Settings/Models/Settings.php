<?php
namespace App\Modules\Settings\Models;

use Illuminate\Database\Eloquent\Model ;

/**
 * App\Modules\Settings\Models\Settings
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $key
 * @property string $value
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Settings\Models\Settings whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Settings\Models\Settings whereKey($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Settings\Models\Settings whereValue($value)
 */
class Settings extends Model
{

    public $timestamps = false;

    protected $fillable = ['key','value'];



}
