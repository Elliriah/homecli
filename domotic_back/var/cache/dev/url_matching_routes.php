<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/heater/add' => [[['_route' => 'add_heater', '_controller' => 'App\\Controller\\HeaterController::createHeater'], null, ['POST' => 0], null, false, false, null]],
        '/heater/show' => [[['_route' => 'heater', '_controller' => 'App\\Controller\\HeaterController::getHeater'], null, null, null, false, false, null]],
        '/light/intensity' => [[['_route' => 'light_intensity', '_controller' => 'App\\Controller\\LightIntensityController::index'], null, null, null, false, false, null]],
        '/light/add' => [[['_route' => 'add_light', '_controller' => 'App\\Controller\\LightIntensityController::createLight'], null, ['POST' => 0], null, false, false, null]],
        '/light/delete' => [[['_route' => 'delete_light', '_controller' => 'App\\Controller\\LightIntensityController::deleteLight'], null, ['DELETE' => 0], null, false, false, null]],
        '/light/show' => [[['_route' => 'light_show', '_controller' => 'App\\Controller\\LightIntensityController::getLight'], null, ['GET' => 0], null, false, false, null]],
        '/scenario/nightmode' => [[['_route' => 'scenario', '_controller' => 'App\\Controller\\ScenarioController::nightMode'], null, ['POST' => 0], null, false, false, null]],
        '/scenario/coldmode' => [[['_route' => 'coldmode', '_controller' => 'App\\Controller\\ScenarioController::coldMode'], null, ['POST' => 0], null, false, false, null]],
        '/shutter/add' => [[['_route' => 'add_shutter', '_controller' => 'App\\Controller\\ShutterController::createShutter'], null, ['POST' => 0], null, false, false, null]],
        '/shutter/show' => [[['_route' => 'shutter', '_controller' => 'App\\Controller\\ShutterController::getShutter'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/heater/(?'
                    .'|delete/([^/]++)(*:68)'
                    .'|show/([^/]++)(*:88)'
                    .'|update/([^/]++)(*:110)'
                .')'
                .'|/light/(?'
                    .'|update/([^/]++)(*:144)'
                    .'|show/([^/]++)(*:165)'
                .')'
                .'|/s(?'
                    .'|cenario/equalizeint/([^/]++)(*:207)'
                    .'|hutter/update/([^/]++)(*:237)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        68 => [[['_route' => 'delete_heater', '_controller' => 'App\\Controller\\HeaterController::deleteHeater'], ['id'], ['DELETE' => 0], null, false, true, null]],
        88 => [[['_route' => 'show_light_by_id', '_controller' => 'App\\Controller\\HeaterController::getHeaterById'], ['id'], ['GET' => 0], null, false, true, null]],
        110 => [[['_route' => 'heater_up', '_controller' => 'App\\Controller\\HeaterController::updateHeater'], ['id'], ['POST' => 0], null, false, true, null]],
        144 => [[['_route' => 'update_light', '_controller' => 'App\\Controller\\LightIntensityController::updateLight'], ['id'], ['POST' => 0], null, false, true, null]],
        165 => [[['_route' => 'light_intensity_show', '_controller' => 'App\\Controller\\LightIntensityController::getLightById'], ['id'], ['GET' => 0], null, false, true, null]],
        207 => [[['_route' => 'equalizeint', '_controller' => 'App\\Controller\\ScenarioController::equalizeIntensity'], ['intensity'], ['POST' => 0], null, false, true, null]],
        237 => [
            [['_route' => 'update_heater', '_controller' => 'App\\Controller\\ShutterController::updateShutter'], ['id'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
