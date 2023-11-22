<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Deleter;

use Generated\Shared\Transfer\ImportProcessDataImportConfigurationCollectionTransfer;

class ImportProcessFileDeleter implements ImportProcessFileDeleterInterface
{
    /**
     * @param \Generated\Shared\Transfer\ImportProcessDataImportConfigurationCollectionTransfer $dataImportConfigurationCollectionTransfer
     *
     * @return void
     */
    public function deleteImportProcessDataImportFiles(
        ImportProcessDataImportConfigurationCollectionTransfer $dataImportConfigurationCollectionTransfer
    ): void {
        foreach ($dataImportConfigurationCollectionTransfer->getDataImportConfigurations() as $dataImportConfigurationTransfer) {
            $filePath = $dataImportConfigurationTransfer->getSourceOrFail();

            if ($filePath !== null && file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }
}
