<?php

namespace yii2bundle\settings\domain\v1\entities;

use yii2rails\domain\BaseEntity;

/**
 * Class PersonalEntity
 *
 * @package yii2bundle\settings\domain\v1\entities
 *
 * @property $user_id
 * @property $data
 */
class PersonalEntity extends BaseEntity
{

    protected $user_id;
    protected $data;

    public function fieldType()
    {
        return [
            'user_id' => 'integer',
        ];
    }

    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
        ];
    }

    public function isEnabledSign() {
        return ($this->data['is_enable_sign']) ? '<br><br>' . $this->data['sign_text'] : null;
    }
}
