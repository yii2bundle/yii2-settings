<?php

namespace yii2bundle\settings\tests\rest\v1;

use yii2bundle\settings\tests\rest\v1\SettingsSchema;
use yii2lab\rest\domain\entities\RequestEntity;
use yii2lab\test\helpers\TestHelper;
use yii2lab\test\Test\BaseActiveApiTest;
use yii2bundle\account\domain\v3\helpers\test\CurrentPhoneTestHelper;
use yii2bundle\account\domain\v3\helpers\test\AuthTestHelper;
use yii2rails\extension\web\enums\HttpMethodEnum;
use yii2bundle\account\domain\v3\helpers\test\RegistrationTestHelper;

class SettingsPersonalTest extends BaseActiveApiTest
{

    public $package = 'api';
    public $point = 'v1';
    public $resource = 'settings';

    public function testGuest()
    {
        AuthTestHelper::logout();

        $requestEntity = new RequestEntity;
        $requestEntity->method = HttpMethodEnum::GET;
        $requestEntity->uri = $this->resource;
        $responseEntity = $this->sendRequest($requestEntity);
        $this->tester->assertEquals(401, $responseEntity->status_code);
    }

    public function testCreateUser()
    {
        if(TestHelper::isSkipMode(['prod'])) return;
        RegistrationTestHelper::registration();
    }

    public function testOneSelf()
    {
        $phone = CurrentPhoneTestHelper::get();
        AuthTestHelper::authByLogin($phone);

        $settingsData = $this->readEntity($this->resource, null, SettingsSchema::$settings);
        $this->tester->assertEquals('ru', $settingsData['language']);
    }

    public function testUpdateSelf()
    {
        $phone = CurrentPhoneTestHelper::get();
        AuthTestHelper::authByLogin($phone);

        $requestEntity = new RequestEntity;
        $requestEntity->method = HttpMethodEnum::PUT;
        $requestEntity->uri = $this->resource;
        $requestEntity->data = [
            'language' => 'kz',
        ];
        $responseEntity = $this->sendRequest($requestEntity);
        $this->tester->assertEquals(204, $responseEntity->status_code);

        $settingsData = $this->readEntity($this->resource, null, SettingsSchema::$settings);
        $this->tester->assertEquals('kz', $settingsData['language']);
    }

}
