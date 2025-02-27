<?php

/**
 * Raise/update static version numbers in composer.json.
 *
 * Run on the CLI: "composer outdated --direct > outdated.txt"
 */
$composerJson = json_decode(file_get_contents('composer.json'), true);

$listOfOutdatedPackages = file('outdated.txt');

foreach ($listOfOutdatedPackages as $line) {

    $regexp = '/(?P<package>[\w]+\/[\w]+).*(?P<currentVersion>\d.\d.\d).*(?P<latestVersion>\d.\d.\d)/';
    preg_match($regexp, $line, $matches);
    $matches = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

    if (isset($matches['package'])) {
        $package = $matches['package'];

        if (isset($composerJson['require'][$package])) {
            $currentVersion = $composerJson['require'][$package];
            echo sprintf('Updating %s from %s to %s', $package, $currentVersion, $matches['latestVersion']) . "\n";
            $composerJson['require'][$package] = $matches['latestVersion'];
        }
        if (isset($composerJson['require-dev'][$package])) {
            $currentVersion = $composerJson['require-dev'][$package];
            echo sprintf('Updating %s from %s to %s', $package, $currentVersion, $matches['latestVersion']) . "\n";
            $composerJson['require-dev'][$package] = $matches['latestVersion'];
        }
    }
}
