<?php
/**
 * Siler routing facilities
 */

namespace Siler\Route;

use function Siler\Http\path;
use function Siler\require_fn;

/**
 * Define a new route
 *
 * @param string $path The HTTP URI to listen on
 * @param string|callable $callback The callable to be executed or a string to be used with Siler\require_fn
 */
function route($path, $callback)
{
    $path = preg_replace('/\{([A-z]+)\}/', '(?<$1>.*)', $path);
    $path = "#^{$path}/?$#";

    if (is_string($callback)) {
        $callback = require_fn($callback);
    }

    if (preg_match($path, path(), $params)) {
        $callback($params);
    }
}
