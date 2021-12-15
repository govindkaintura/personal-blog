<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'article_id',
        'fname',
        'lname',
        'email',
    ];

    /**
     * Store resource.
     *
     * @param $params
     *
     * @return \App\Models\Partner
     */
    public static function storeResource($params)
    {
        // Return.
        return self::create(
            $params
        );
    }

    /**
     * Update resource.
     *
     * @param $params
     *
     * @return \App\Models\Partner
     */
    public static function updateResource($params, $conditions)
    {
        // Return.
        self::where($conditions)->update(
            $params
        );

        return self::where($conditions)
            ->first();
    }

    /**
     * Create or Update resource.
     *
     * @param $params
     *
     * @return \App\Models\Partner
     */
    public static function createOrUpdateResource($params, $conditions)
    {
        // Do we have any existing record?
        $record = self::where($conditions)
            ->first();

        // Do we have it?
        if ($record) {
            // Return.
            return self::updateResource(
                $params,
                $conditions
            );
        }

        // Return.
        return self::storeResource(
            $params
        );
    }
}