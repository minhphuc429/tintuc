<?php
/**
 * Created by PhpStorm.
 * User: PhucNM
 * Date: 3/5/2019
 * Time: 8:44 AM
 */

namespace App\Repositories\Criteria;

use App\Repositories\Contracts\RepositoryInterface as Repository;

abstract class Criteria
{
    /**
     * @param $model
     * @param Repository $repository
     * @return mixed
     */
    public abstract function apply($model, Repository $repository);
}
