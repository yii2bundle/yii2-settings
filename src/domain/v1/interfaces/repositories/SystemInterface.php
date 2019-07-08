<?php

namespace yii2bundle\settings\domain\v1\interfaces\repositories;
use yii2rails\domain\interfaces\repositories\ReadAllInterface;
use yii2rails\domain\interfaces\repositories\ReadOneInterface;

/**
 * Interface SystemInterface
 * 
 * @package yii2bundle\settings\domain\v1\interfaces\repositories
 * 
 * @property-read \yii2bundle\settings\domain\v1\Domain $domain
 */
interface SystemInterface extends ReadAllInterface, ReadOneInterface {

}
