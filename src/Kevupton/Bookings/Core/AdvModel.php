<?php namespace Kevupton\Bookings\Core;

use Illuminate\Database\Eloquent\Model;


class AdvModel extends Model {

    /**
     * Define a has-many-through relationship.
     *
     * @param  string $related
     * @param  string $through
     * @param  string|null $firstKey
     * @param  string|null $secondKey
     * @param null $localKey
     * @param null $pivotKey
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function hasManyThroughCustom($related, $through, $firstKey = null, $secondKey = null, $localKey = null, $pivotKey = null)
    {
        $through = new $through;

        $firstKey = $firstKey ?: $this->getForeignKey();

        $secondKey = $secondKey ?: $through->getForeignKey();

        $localKey = $localKey ?: $this->getKeyName();

        return new HasManyThroughCustom((new $related)->newQuery(), $this, $through, $firstKey, $secondKey, $localKey, $pivotKey);
    }
}
