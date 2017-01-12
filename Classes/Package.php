<?php
namespace Flownative\Flow\Tideways;

/*
 * This file is part of the Flownative.Flow.Tideways package.
 *
 * (c) Flownative GmbH - https://www.flownative.com/
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Tideways\Profiler;
use TYPO3\Flow\Core\Bootstrap;
use TYPO3\Flow\Package\Package as BasePackage;

/**
 * The Flownative.Flow.Tideways Package class adds additional instrumentation calls.
 */
class Package extends BasePackage
{
    /**
     * Invokes custom PHP code directly after the package manager has been initialized.
     *
     * @param Bootstrap $bootstrap The current bootstrap
     * @return void
     */
    public function boot(Bootstrap $bootstrap)
    {
        if (!class_exists(Profiler::class)) {
            return;
        }

        Profiler::setCustomVariable('FLOW_CONTEXT', (string)$bootstrap->getContext());
        Profiler::setCustomVariable('FLOW_PATH_ROOT', FLOW_PATH_ROOT);
        Profiler::setCustomVariable('FLOW_PATH_TEMPORARY', FLOW_PATH_TEMPORARY);
    }
}
