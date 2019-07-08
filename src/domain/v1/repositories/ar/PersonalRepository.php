<?php

namespace yii2bundle\settings\domain\v1\repositories\ar;

use yii2bundle\settings\domain\v1\entities\PersonalEntity;
use yii2bundle\settings\domain\v1\interfaces\repositories\PersonalInterface;
use yii2rails\domain\data\Query;
use yii2rails\extension\activeRecord\repositories\base\BaseActiveArRepository;

/**
 * Class PersonalRepository
 *
 * @package yii2bundle\settings\domain\v1\repositories\ar
 *
 * @property-read \yii2bundle\settings\domain\v1\Domain $domain
 */
class PersonalRepository extends BaseActiveArRepository implements PersonalInterface
{

    protected $schemaClass = true;
    protected $primaryKey = 'user_id';

    public function tableName()
    {
        return 'settings_personal';
    }

    public function oneByUserId(int $userId, Query $query = null) : PersonalEntity
    {
        $query = Query::forge($query);
        $query->andWhere(['user_id' => $userId]);
        return $this->one($query);
    }

}
