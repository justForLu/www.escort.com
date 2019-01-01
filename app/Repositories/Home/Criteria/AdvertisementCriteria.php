<?php
namespace App\Repositories\Home\Criteria;


use Bosnadev\Repositories\Criteria\Criteria;
use Bosnadev\Repositories\Contracts\RepositoryInterface as Repository;

class AdvertisementCriteria extends Criteria {

    private $conditions;

    public function __construct($conditions){
        $this->conditions = $conditions;
    }

    /**
     * @param $model
     * @param Repository $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        if(isset($this->conditions['name']) && !empty($this->conditions['name'])){
            $model = $model->where('name', 'like','%' . $this->conditions['name'] . '%');
        }

        if(isset($this->conditions['position']) && !empty($this->conditions['position'])){
            $model = $model->where('position', '=',$this->conditions['position']);
        }

        if(isset($this->conditions['status']) && !empty($this->conditions['status'])){
            $model = $model->where('status', '=',$this->conditions['status']);
        }

        $model = $model->orderBy('sort','ASC');

        $model = $model->orderBy('id','DESC');

        return $model;
    }
}