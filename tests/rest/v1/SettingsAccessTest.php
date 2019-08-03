<?php

namespace yii2bundle\settings\tests\rest\v1;

use yii2lab\rest\domain\entities\RequestEntity;
use yii2tool\test\Test\BaseActiveApiTest;
use yii2bundle\account\domain\v3\helpers\test\AuthTestHelper;
use yii2rails\extension\web\enums\HttpMethodEnum;

class SettingsAccessTest extends BaseActiveApiTest
{

    public $package = 'api';
    public $point = 'v1/settings';

    public function testGuest()
    {
        AuthTestHelper::logout();

        $requestEntity = new RequestEntity;
        $requestEntity->method = HttpMethodEnum::GET;
        $responseEntity = $this->sendRequest($requestEntity);
        $this->tester->assertEquals(401, $responseEntity->status_code);
    }

}
