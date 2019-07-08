<?php

$version = API_VERSION_STRING;

return [
    "{$version}/settings-system/<id:.+>" => "settings/system/view",
    ["class" => "yii\\rest\UrlRule", "controller" => ["{$version}/settings-system" => "settings/system"]],

    "GET {$version}/settings" => "settings/personal/view",
    "PUT {$version}/settings" => "settings/personal/update",
    "OPTIONS {$version}/settings" => "settings/personal/options",
];
