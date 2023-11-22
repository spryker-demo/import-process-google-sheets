<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ImportProcessGoogleSheets\Communication\Plugin\ImportProcess;

use Generated\Shared\Transfer\ImportProcessDataImportConfigurationCollectionTransfer;
use Generated\Shared\Transfer\ImportProcessTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use SprykerDemo\Zed\ImportProcess\Dependency\Plugin\ImportProcessDataImportConfigurationBuilderPluginInterface;

/**
 * @method \SprykerDemo\Zed\ImportProcessGoogleSheets\Business\ImportProcessGoogleSheetsFacadeInterface getFacade()
 * @method \SprykerDemo\Zed\ImportProcessGoogleSheets\ImportProcessGoogleSheetsConfig getConfig()
 */
class ImportProcessSpreadsheetDataImportConfigurationBuilderPlugin extends AbstractPlugin implements ImportProcessDataImportConfigurationBuilderPluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $importProcessType
     *
     * @return bool
     */
    public function isApplicable(string $importProcessType): bool
    {
        return $importProcessType === $this->getConfig()->getSourceType();
    }

    /**
     * {@inheritDoc}
     * - Saves sheet content to a temporary CSV file.
     * - Returns data import configuration transfer containing the path to temporary CSV file as source for data import.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ImportProcessTransfer $importProcessTransfer
     *
     * @return \Generated\Shared\Transfer\ImportProcessDataImportConfigurationCollectionTransfer
     */
    public function buildDataImportConfigurations(ImportProcessTransfer $importProcessTransfer): ImportProcessDataImportConfigurationCollectionTransfer
    {
        return $this->getFacade()->buildDataImportConfigurations($importProcessTransfer);
    }
}
