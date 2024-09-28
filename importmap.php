<?php

/**
 * Returns the importmap for this application.
 *
 * - "path" is a path inside the asset mapper system. Use the
 *     "debug:asset-map" command to see the full list of paths.
 *
 * - "entrypoint" (JavaScript only) set to true for any module that will
 *     be used as an "entrypoint" (and passed to the importmap() Twig function).
 *
 * The "importmap:require" command can be used to add new entries to this file.
 */
return [
    'app' => [
        'path' => './assets/app.js',
        'entrypoint' => true,
    ],
    '@hotwired/stimulus' => [
        'version' => '3.2.2',
    ],
    '@symfony/stimulus-bundle' => [
        'path' => './vendor/symfony/stimulus-bundle/assets/dist/loader.js',
    ],
    '@hotwired/turbo' => [
        'version' => '7.3.0',
    ],
    'bootstrap' => [
        'version' => '5.3.3',
    ],
    '@popperjs/core' => [
        'version' => '2.11.8',
    ],
    'bootstrap/dist/css/bootstrap.min.css' => [
        'version' => '5.3.3',
        'type' => 'css',
    ],
    'jquery' => [
        'version' => '3.7.1',
    ],
    'datatables.net-bs5' => [
        'version' => '2.1.5',
    ],
    'datatables.net-bs5/css/dataTables.bootstrap5.min.css' => [
        'version' => '2.1.5',
        'type' => 'css',
    ],
    'datatables.net-responsive-bs5' => [
        'version' => '3.0.3',
    ],
    'datatables.net-responsive' => [
        'version' => '3.0.3',
    ],
    'datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css' => [
        'version' => '3.0.3',
        'type' => 'css',
    ],
    'datatables.net-buttons-bs5' => [
        'version' => '3.1.2',
    ],
    'datatables.net-buttons' => [
        'version' => '3.1.2',
    ],
    'datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css' => [
        'version' => '3.1.2',
        'type' => 'css',
    ],
    'datatables.net' => [
        'version' => '2.1.7',
    ],
    'jszip' => [
        'version' => '3.10.1',
    ],
    'pdfmake' => [
        'version' => '0.2.13',
    ],
    '@fortawesome/free-solid-svg-icons' => [
        'version' => '6.6.0',
    ],
];
