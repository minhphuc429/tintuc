<?php
/**
 * Created by PhpStorm.
 * User: PhucNM
 * Date: 3/4/2019
 * Time: 4:08 PM
 */

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class TagRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = \App\Models\Tag::class;
}
