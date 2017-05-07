<?php

use Symfony\Component\Dotenv\Dotenv;

require dirname(__DIR__).'/vendor/autoload.php';

// The check is to ensure that we don't load the .env file in production
// The APP_SECRET is needed for Symfony to work, but there's very low chances that it's ever set manually, so it's a
// good candidate for this condition.
if (!getenv('APP_SECRET')) {
    (new Dotenv())->load(dirname(__DIR__).'/.env');
}
