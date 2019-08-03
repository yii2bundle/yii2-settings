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

class SettingsSystemTest extends BaseActiveApiTest
{

    public $package = 'api';
    public $point = 'v1';
    public $resource = 'settings-system';

    public function testAll()
    {
        $settingsData = $this->readEntity($this->resource, null);
        $this->tester->assertEquals([
            "access" => "open",
            "defaultStatus" => 1,
        ], $settingsData['account']['registration']);
    }

    public function testOne()
    {
        $settingsData = $this->readEntity($this->resource, 'account');
        $this->tester->assertEquals([
            "access" => "open",
            "defaultStatus" => 1,
        ], $settingsData['registration']);

        $settingsData = $this->readEntity($this->resource, 'account.registration');
        $this->tester->assertEquals([
            "access" => "open",
            "defaultStatus" => 1,
        ], $settingsData);
    }

}
