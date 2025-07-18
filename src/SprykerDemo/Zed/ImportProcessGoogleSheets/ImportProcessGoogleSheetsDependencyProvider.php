<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ImportProcessGoogleSheets;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ImportProcessGoogleSheetsDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const FACADE_IMPORT_PROCESS = 'FACADE_IMPORT_PROCESS';

    /**
     * @var string
     */
    public const SERVICE_GOOGLE_SHEETS = 'SERVICE_GOOGLE_SHEETS';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = $this->addImportProcessFacade($container);
        $container = $this->addGoogleSheetsService($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addImportProcessFacade(Container $container): Container
    {
        $container->set(static::FACADE_IMPORT_PROCESS, function (Container $container) {
            return $container->getLocator()->importProcess()->facade();
        });

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addGoogleSheetsService(Container $container): Container
    {
        $container->set(static::SERVICE_GOOGLE_SHEETS, function (Container $container) {
            return $container->getLocator()->googleSheets()->service();
        });

        return $container;
    }
}
