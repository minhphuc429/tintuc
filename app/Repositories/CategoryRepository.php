<?php
/**
 * Created by PhpStorm.
 * User: PhucNM
 * Date: 3/4/2019
 * Time: 4:08 PM
 */

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class CategoryRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Models\Category';
    }
}
