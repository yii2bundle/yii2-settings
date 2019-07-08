<?php

namespace yii2bundle\settings\domain\v1\services;

use yii2bundle\settings\domain\v1\entities\PersonalEntity;
use yii2bundle\settings\domain\v1\interfaces\services\PersonalInterface;
use yii\web\NotFoundHttpException;
use yii2rails\domain\exceptions\UnprocessableEntityHttpException;
use yii2rails\domain\helpers\ErrorCollection;
use yii2rails\domain\services\base\BaseActiveService;

/**
 * Class PersonalService
 *
 * @package yii2bundle\settings\domain\v1\services
 *
 * @property-read \yii2bundle\settings\domain\v1\Domain $domain
 * @property-read \yii2bundle\settings\domain\v1\interfaces\repositories\PersonalInterface $repository
 */
class PersonalService extends BaseActiveService implements PersonalInterface
{

    public $entityName = 'settings.personal';

    public function oneSelf()
    {
        $userId = \App::$domain->account->auth->identity->id;
        try {
            $settingsEntity = $this->repository->oneByUserId($userId);
        } catch (NotFoundHttpException $e) {
            $this->updateSelf([]);
            $settingsEntity = $this->repository->oneByUserId($userId);
        }
        return $settingsEntity->data;
    }

    public function updateSelf(array $settings)
    {
        $settingsEntity = new PersonalEntity;
        $settingsEntity->user_id = \App::$domain->account->auth->identity->id;
        $settingsEntity->data = \App::$domain->model->entity->validateByName($this->entityName, $settings);
        $settingsEntity->validate();
        try {
            \App::$domain->lang->language->oneByCode($settingsEntity->data['language']);
        } catch (NotFoundHttpException $e) {
            $error = new ErrorCollection;
            $error->add('language', 'mail/settings', 'not_found');
            throw new UnprocessableEntityHttpException($error);
        }
        $this->repository->updateOrInsert($settingsEntity);
    }

}
