<?php

namespace Ivy\Maint\Functions;

use Ivy\Mu\Launchers\AutoDiscoverLauncher;

/**
 * @return bool
 * @throws \Exception
 */
function checkEnvironment()
{
    $requiredPhpVersion = '7.0';
    $requiredMuVersion  = '0.6.2';

    if (!version_compare(phpversion(), $requiredPhpVersion, '>=') &&
        version_compare(IVY_MU_VERSION, $requiredMuVersion, '>=')) {
        throw new \Exception("Version mismatch. PHP should be {$requiredPhpVersion}+, and Ivy-MU should be {$requiredMuVersion}+.");
    }

    return true;
}

/**
 * @param string $mainFile
 * @param string $version
 *
 * @return AutoDiscoverLauncher
 * @throws \Exception
 */
function initLauncher($mainFile, $version)
{
    checkEnvironment();

    $launcher = new AutoDiscoverLauncher();
    $launcher->setMainFile($mainFile);
    $launcher->setVersion($version);
    $launcher->setSlug(getSlug());
    $launcher->setPrefix(getPrefix());
    $launcher->setup(array('rootNamespace' => 'Ivy\\Maint\\'));

    return $launcher;
}
