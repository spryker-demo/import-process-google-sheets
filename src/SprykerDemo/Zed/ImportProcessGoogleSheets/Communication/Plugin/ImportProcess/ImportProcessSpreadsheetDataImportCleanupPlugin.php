<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ImportProcessGoogleSheets\Communication\Plugin\ImportProcess;

use Generated\Shared\Transfer\ImportProcessDataImportConfigurationCollectionTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use SprykerDemo\Zed\ImportProcess\Dependency\Plugin\ImportProcessDataImportPostExecutePluginInterface;

/**
 * @method \SprykerDemo\Zed\ImportProcessGoogleSheets\Business\ImportProcessGoogleSheetsFacadeInterface getFacade()
 */
class ImportProcessSpreadsheetDataImportCleanupPlugin extends AbstractPlugin implements ImportProcessDataImportPostExecutePluginInterface
{
    /**
     * {@inheritDoc}
     * - Cleans up temporary CSV files.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ImportProcessDataImportConfigurationCollectionTransfer $dataImportConfigurationCollectionTransfer
     *
     * @return void
     */
    public function postExecute(ImportProcessDataImportConfigurationCollectionTransfer $dataImportConfigurationCollectionTransfer): void
    {
        $this->getFacade()->cleanupImportProcessPayloadData($dataImportConfigurationCollectionTransfer);
    }
}
