<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Writer;

use Generated\Shared\Transfer\ImportProcessSpreadsheetDataFileTransfer;
use SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Reader\SpreadsheetReaderInterface;

interface ImportProcessGoogleSheetsCsvWriterInterface
{
    /**
     * @param \Generated\Shared\Transfer\ImportProcessSpreadsheetDataFileTransfer $importProcessSpreadsheetDataFile
     * @param \SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Reader\SpreadsheetReaderInterface $spreadsheetReader
     *
     * @return \Generated\Shared\Transfer\ImportProcessSpreadsheetDataFileTransfer
     */
    public function writeData(
        ImportProcessSpreadsheetDataFileTransfer $importProcessSpreadsheetDataFile,
        SpreadsheetReaderInterface $spreadsheetReader
    ): ImportProcessSpreadsheetDataFileTransfer;
}
