<?php
namespace App\Modules\Portfolio\Models;
use App\Models\Model;
use App\Models\Image as Img;


/**
 * App\Modules\Portfolio\Models\Image
 *
 * @property-read \App\Modules\Portfolio\Models\Portfolio $parent
 * @property-read mixed $image_thumb
 * @property-read mixed $image_full
 * @property-read mixed $image_mini
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Image order()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Model admin()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Model filtered()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Model published()
 * @mixin \Eloquent
 * @property int $id
 * @property int $portfolio_id
 * @property int $position
 * @property string $image
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Image whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Image wherePortfolioId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Image wherePosition($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Image whereImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Portfolio\Models\Image whereUpdatedAt($value)
 */
class Image extends Model
{

    use Img;

    protected $table = 'portfolio_images';


    public function imagePrefixPath(){
        return '/uploads/portfolio/';
    }

    public function parent(){
        return $this->belongsTo("App\Modules\Portfolio\Models\Portfolio", 'portfolio_id');
    }

    public function scopeOrder($query)
    {
        return $query->orderBy('position');
    }

    public function getImageThumbAttribute(){
        if (!$this->image){
            return false;
        }

        if (!is_file(public_path().'/uploads/portfolio/thumb/'.$this->image)){
            return false;
        }

        return '/uploads/portfolio/thumb/'.$this->image;
    }

    public function getImageFullAttribute(){
        if (!$this->image){
            return false;
        }

        if (!is_file(public_path().'/uploads/portfolio/full/'.$this->image)){
            return false;
        }

        return '/uploads/portfolio/full/'.$this->image;
    }




}
