<?php

namespace yii2bundle\settings\domain\v1\interfaces\services;
use yii2rails\domain\interfaces\services\ReadAllInterface;
use yii2rails\domain\interfaces\services\ReadOneInterface;

/**
 * Interface SystemInterface
 * 
 * @package yii2bundle\settings\domain\v1\interfaces\services
 * 
 * @property-read \yii2bundle\settings\domain\v1\Domain $domain
 * @property-read \yii2bundle\settings\domain\v1\interfaces\repositories\SystemInterface $repository
 */
interface SystemInterface extends ReadAllInterface, ReadOneInterface {



}
