<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], []],
    'delete_heater' => [['id'], ['_controller' => 'App\\Controller\\HeaterController::deleteHeater'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/heater/delete']], [], []],
    'show_light_by_id' => [['id'], ['_controller' => 'App\\Controller\\HeaterController::getHeaterById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/heater/show']], [], []],
    'heater_up' => [['id'], ['_controller' => 'App\\Controller\\HeaterController::updateHeater'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/heater/update']], [], []],
    'add_heater' => [[], ['_controller' => 'App\\Controller\\HeaterController::createHeater'], [], [['text', '/heater/add']], [], []],
    'heater' => [[], ['_controller' => 'App\\Controller\\HeaterController::getHeater'], [], [['text', '/heater/show']], [], []],
    'light_intensity' => [[], ['_controller' => 'App\\Controller\\LightIntensityController::index'], [], [['text', '/light/intensity']], [], []],
    'update_light' => [['id'], ['_controller' => 'App\\Controller\\LightIntensityController::updateLight'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/light/update']], [], []],
    'add_light' => [[], ['_controller' => 'App\\Controller\\LightIntensityController::createLight'], [], [['text', '/light/add']], [], []],
    'delete_light' => [[], ['_controller' => 'App\\Controller\\LightIntensityController::deleteLight'], [], [['text', '/light/delete']], [], []],
    'light_show' => [[], ['_controller' => 'App\\Controller\\LightIntensityController::getLight'], [], [['text', '/light/show']], [], []],
    'light_intensity_show' => [['id'], ['_controller' => 'App\\Controller\\LightIntensityController::getLightById'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/light/show']], [], []],
    'scenario' => [[], ['_controller' => 'App\\Controller\\ScenarioController::nightMode'], [], [['text', '/scenario/nightmode']], [], []],
    'equalizeint' => [['intensity'], ['_controller' => 'App\\Controller\\ScenarioController::equalizeIntensity'], [], [['variable', '/', '[^/]++', 'intensity', true], ['text', '/scenario/equalizeint']], [], []],
    'coldmode' => [[], ['_controller' => 'App\\Controller\\ScenarioController::coldMode'], [], [['text', '/scenario/coldmode']], [], []],
    'update_heater' => [['id'], ['_controller' => 'App\\Controller\\ShutterController::updateShutter'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/shutter/update']], [], []],
    'add_shutter' => [[], ['_controller' => 'App\\Controller\\ShutterController::createShutter'], [], [['text', '/shutter/add']], [], []],
    'shutter' => [[], ['_controller' => 'App\\Controller\\ShutterController::getShutter'], [], [['text', '/shutter/show']], [], []],
];
