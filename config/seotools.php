<?php

return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Game shop", // set false to total remove
            'description'  => 'The first game shop', // set false to total remove
            'separator'    => ' | ',
            'keywords'     => [],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
        ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'        => "Game shop", // set false to total remove
            'description'  => 'The first game shop', // set false to total remove
            'url'         => 'http://gameshop.loc/>', // Set null for using Url::current(), set false to total remove
            'type'        => 'website',
            'site_name'   => false,
            'images'      => ['/favicon.ico','width' => 32, 'height' => 32 ],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
          //'card'        => 'summary',
          //'site'        => '@LuizVinicius73',
        ],
    ],
];
