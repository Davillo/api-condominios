<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use ReflectionClass;

class BaseModel extends Model
{
    protected $searchable = [];

    public function scopeSearch(Builder $query, array $fields, Builder $initialQuery = null)
    {
        $searchable = Arr::only($fields, $this->searchable);
        $query = $initialQuery ?? $query;

        if (array_key_exists($this->getKeyName(), $searchable)) {
            $query->find($searchable[$this->getKeyName()]);
        }

        return $query->where(
            function (Builder $query) use ($searchable) {
                foreach (Arr::except($searchable, $this->getKeyName()) as $key => $value) {
                    if (is_array($value)) {
                        array_walk(
                            $value,
                            function ($val) use ($query, $key) {
                                $query->orWhere($key, "like", "%$val%");
                            }
                        );
                    } else {
                        $query->where($key, "like", "%$value%");
                    }
                }

                return $query;
            }
        );
    }
}
