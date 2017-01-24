<?php
/**
 * Helper functions to work with the Twig template engine
 */

namespace Siler\Twig;

/**
 * Initialze the Twig environment
 *
 * @param string $templatesPath Path to templates
 * @param string $templatesCachePath Path to templates cache
 * @param bool $debug Should TwigEnv allow debugging
 *
 * @return \Twig_Environment
 */
function init($templatesPath, $templatesCachePath = null, $debug = null)
{
    if (is_null($debug)) {
        $debug = false;
    }

    $twig = new \Twig_Environment(new \Twig_Loader_Filesystem($templatesPath), [
        'debug' => $debug,
        'cache' => $templatesCachePath,
    ]);

    $GLOBALS['twig'] = $twig;

    return $twig;
}

/**
 * Renders the given template within the given data
 *
 * @param string $name The template name in the templates path
 * @param array $data The array of data to used within the template
 *
 * @return string
 */
function render($name, $data = [])
{
    $twig = $GLOBALS['twig'];
    return $twig->render($name, $data);
}
