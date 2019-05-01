<?php


require dirname(__DIR__) . '/src/Converter.php';

use WPReadme2Markdown\Converter;

if (empty($argv[1])) {
    echo "No Wordpress plugin readme.txt provided as option! Quitting!\n";
    die(-1);
}

if (!empty($argv[1])) {
    $wordpress_readme = file_get_contents($argv[1]);
    $gfm_readme = Converter::convert($wordpress_readme);
    $r = file_put_contents('README.md', $gfm_readme);
    if ($r !== false) {
        print "Wrote $r bytes successfully to README.md ! \n";
    }
};
