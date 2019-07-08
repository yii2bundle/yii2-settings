<?php

namespace yii2bundle\settings\domain\v1\repositories\env;

use yii2bundle\settings\domain\v1\entities\SystemEntity;
use yii2bundle\settings\domain\v1\interfaces\repositories\SystemInterface;
use yii\helpers\ArrayHelper;
use yii2rails\app\domain\helpers\EnvService;
use yii2rails\domain\data\Query;
use yii2rails\domain\repositories\BaseRepository;

/**
 * Class SystemRepository
 * 
 * @package yii2bundle\settings\domain\v1\repositories\env
 * 
 * @property-read \yii2bundle\settings\domain\v1\Domain $domain
 */
class SystemRepository extends BaseRepository implements SystemInterface {

    public function all(Query $query = null)
    {
        $config = EnvService::get(null);
        return $config;
    }

    public function count(Query $query = null)
    {
        return count($this->all($query));
    }

    public function oneById($id, Query $query = null)
    {
        $all = $this->all();
        return ArrayHelper::getValue($all, $id);
    }
}
