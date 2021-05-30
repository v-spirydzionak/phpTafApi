<?php
namespace Taf\Tests;

use Codeception\Example;
use Yandex\Allure\Adapter\Annotation\AllureId;
use Yandex\Allure\Adapter\Annotation\Title;
use Yandex\Allure\Adapter\Annotation\Description;
use Yandex\Allure\Adapter\Annotation\TestCaseId;
use Yandex\Allure\Adapter\Annotation\Issues;
use Yandex\Allure\Adapter\Annotation\Features;
use Yandex\Allure\Adapter\Annotation\Stories;

class ApiCest 
{
    /**
     * @AllureId("123")
     * @Title("Test link title")
     * @Issues("SSS-1111")
     * @TestCaseId("23")
     * @Description("Test link test desc")
     * @Features({"First Feature"})
     * @Stories({"First Story"})
     * @dataProvider pageProvider
     * @param ApiTester $I
     * @param Example $example
     */
    public function tryApi(ApiTester $I,  Example $example)
    {
        $I->sendGet($example['url']);
        $I->seeResponseCodeIs($example['status']);
    }

    /**
     * @return array
     */
    protected function pageProvider()
    {
        return [
            ['url' => "/status/200", 'status' => '200'],
        ];
    }
}