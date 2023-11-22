<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Builder;

use Generated\Shared\Transfer\ImportProcessDataImportConfigurationCollectionTransfer;
use Generated\Shared\Transfer\ImportProcessDataImportConfigurationTransfer;
use Generated\Shared\Transfer\ImportProcessSpreadsheetReaderConfigurationTransfer;
use Generated\Shared\Transfer\ImportProcessTransfer;
use SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Downloader\ImportProcessGoogleSheetsDownloaderInterface;

class ImportProcessGoogleSheetsDataImportConfigurationBuilder implements ImportProcessGoogleSheetsDataImportConfigurationBuilderInterface
{
    /**
     * @var \SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Downloader\ImportProcessGoogleSheetsDownloaderInterface
     */
    protected ImportProcessGoogleSheetsDownloaderInterface $importProcessGoogleSheetsDownloader;

    /**
     * @param \SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Downloader\ImportProcessGoogleSheetsDownloaderInterface $importProcessGoogleSheetsDownloader
     */
    public function __construct(ImportProcessGoogleSheetsDownloaderInterface $importProcessGoogleSheetsDownloader)
    {
        $this->importProcessGoogleSheetsDownloader = $importProcessGoogleSheetsDownloader;
    }

    /**
     * @param \Generated\Shared\Transfer\ImportProcessTransfer $importProcessTransfer
     *
     * @return \Generated\Shared\Transfer\ImportProcessDataImportConfigurationCollectionTransfer
     */
    public function buildDataImportConfigurations(
        ImportProcessTransfer $importProcessTransfer
    ): ImportProcessDataImportConfigurationCollectionTransfer {
        $dataImportConfigurationCollectionTransfer = new ImportProcessDataImportConfigurationCollectionTransfer();

        foreach ($importProcessTransfer->getDataImportTypes() as $dataImportType) {
            $importProcessSpreadsheetReaderConfigurationTransfer = (new ImportProcessSpreadsheetReaderConfigurationTransfer())
                ->setSpreadsheetUrl($importProcessTransfer->getSource())
                ->setSheetName($dataImportType);

            $importProcessSpreadsheetDataFileTransfer = $this->importProcessGoogleSheetsDownloader
                ->downloadSheetContent($importProcessSpreadsheetReaderConfigurationTransfer);

            $dataImportConfigurationTransfer = (new ImportProcessDataImportConfigurationTransfer())
                ->setSource($importProcessSpreadsheetDataFileTransfer->getFilePath())
                ->setType($dataImportType);

            $dataImportConfigurationCollectionTransfer->addDataImportConfiguration($dataImportConfigurationTransfer);
        }

        return $dataImportConfigurationCollectionTransfer;
    }
}
