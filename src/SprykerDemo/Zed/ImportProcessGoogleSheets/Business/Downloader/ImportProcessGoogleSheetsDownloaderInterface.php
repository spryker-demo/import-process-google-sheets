<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Downloader;

use Generated\Shared\Transfer\ImportProcessSpreadsheetDataFileTransfer;
use Generated\Shared\Transfer\ImportProcessSpreadsheetReaderConfigurationTransfer;

interface ImportProcessGoogleSheetsDownloaderInterface
{
    /**
     * @param \Generated\Shared\Transfer\ImportProcessSpreadsheetReaderConfigurationTransfer $importProcessSpreadsheetReaderConfigurationTransfer
     *
     * @return \Generated\Shared\Transfer\ImportProcessSpreadsheetDataFileTransfer
     */
    public function downloadSheetContent(
        ImportProcessSpreadsheetReaderConfigurationTransfer $importProcessSpreadsheetReaderConfigurationTransfer
    ): ImportProcessSpreadsheetDataFileTransfer;
}
