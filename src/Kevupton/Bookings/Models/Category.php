<?php namespace Kevupton\Bookings\Models;

use Kevupton\Ethereal\Models\Ethereal;

class Category extends Ethereal {

    protected $table = 'categories';
    // validation rules
    public static $rules = array(
        'category' => 'required|max:30',
        'parent_id' => 'foreign_int:categories,id'
    );

    protected $fillable = array(
        'category', 'parent_id'
    );

    public static $relationsData = array(
        'parent' => array(self::BELONGS_TO, Category::class, 'parent_id', 'id'),
        'children' => array(self::HAS_MANY, Category::class, 'parent_id', 'id')
    );

    public static function getCategorySelectArray($category_id, $any = false) {
        $results = Category::where('parent_id', '=', $category_id)->get();
        $array =  self::addToArray($results);
        if ($any) {
            return ['' => 'Any'] + $array;
        } else return $array;
    }

    private static function addToArray($results, $level = 0) {
        $array = array();
        foreach ($results as $category) {
            $label = $category->category;
            if (count($category->children) > 0) {
                $array[$label] = self::addToArray($category->children, $level + 1);
            }  else {
                $array[$category->id] = $label;
            }
        }
        return $array;
    }

    public function getMainParent() {
        if ( ! is_null($this->parent)) {
            return $this->parent->getMainParent();
        } else {
            return $this;
        }
    }
}
