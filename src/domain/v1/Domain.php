<?php

namespace yii2bundle\settings\domain\v1;

use yii2rails\domain\enums\Driver;

/**
 * Class Domain
 * 
 * @package yii2bundle\settings\domain\v1
 * @property-read \yii2bundle\settings\domain\v1\interfaces\repositories\RepositoriesInterface $repositories
 * @property-read \yii2bundle\settings\domain\v1\interfaces\services\SystemInterface $system
 * @property-read \yii2bundle\settings\domain\v1\interfaces\services\PersonalInterface $personal
 */
class Domain extends \yii2rails\domain\Domain {
	
	public function config() {
		return [
			'repositories' => [
                'system' => Driver::ENV,
                'personal' => Driver::ACTIVE_RECORD,
			],
			'services' => [
                'system',
                'personal',
			],
		];
	}
	
}