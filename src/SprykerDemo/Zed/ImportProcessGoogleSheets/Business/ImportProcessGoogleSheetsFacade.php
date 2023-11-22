<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ImportProcessGoogleSheets\Business;

use Generated\Shared\Transfer\ImportProcessDataImportConfigurationCollectionTransfer;
use Generated\Shared\Transfer\ImportProcessTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \SprykerDemo\Zed\ImportProcessGoogleSheets\Business\ImportProcessGoogleSheetsBusinessFactory getFactory()
 */
class ImportProcessGoogleSheetsFacade extends AbstractFacade implements ImportProcessGoogleSheetsFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $spreadsheetUrl
     * @param array<string> $sheetNames
     *
     * @return \Generated\Shared\Transfer\ImportProcessTransfer
     */
    public function createImportProcess(string $spreadsheetUrl, array $sheetNames): ImportProcessTransfer
    {
        return $this->getFactory()->createImportProcessGoogleSheetsProcessCreator()->createImportProcess($spreadsheetUrl, $sheetNames);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ImportProcessTransfer $importProcessTransfer
     *
     * @return \Generated\Shared\Transfer\ImportProcessDataImportConfigurationCollectionTransfer
     */
    public function buildDataImportConfigurations(
        ImportProcessTransfer $importProcessTransfer
    ): ImportProcessDataImportConfigurationCollectionTransfer {
        return $this->getFactory()->createImportProcessGoogleSheetsDataImportConfigurationBuilder()
            ->buildDataImportConfigurations($importProcessTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return array<string>
     */
    public function getAllowedImportTypes(): array
    {
        return $this->getFactory()->getConfig()->getAllowedImportTypes();
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ImportProcessDataImportConfigurationCollectionTransfer $dataImportConfigurationCollectionTransfer
     *
     * @return void
     */
    public function cleanupImportProcessDataImportFiles(
        ImportProcessDataImportConfigurationCollectionTransfer $dataImportConfigurationCollectionTransfer
    ): void {
        $this->getFactory()->createImportProcessFileDeleter()
            ->deleteImportProcessDataImportFiles($dataImportConfigurationCollectionTransfer);
    }
}
