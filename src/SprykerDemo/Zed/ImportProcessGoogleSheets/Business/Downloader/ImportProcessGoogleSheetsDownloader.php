<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Downloader;

use Generated\Shared\Transfer\ImportProcessSpreadsheetDataFileTransfer;
use Generated\Shared\Transfer\ImportProcessSpreadsheetReaderConfigurationTransfer;
use SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Reader\SpreadsheetReaderFactoryInterface;
use SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Reader\SpreadsheetReaderInterface;
use SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Writer\ImportProcessGoogleSheetsCsvWriterInterface;
use SprykerDemo\Zed\ImportProcessGoogleSheets\ImportProcessGoogleSheetsConfig;

class ImportProcessGoogleSheetsDownloader implements ImportProcessGoogleSheetsDownloaderInterface
{
    /**
     * @var \SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Writer\ImportProcessGoogleSheetsCsvWriterInterface
     */
    protected ImportProcessGoogleSheetsCsvWriterInterface $importProcessGoogleSheetsCsvWriter;

    /**
     * @var \SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Reader\SpreadsheetReaderFactoryInterface
     */
    protected SpreadsheetReaderFactoryInterface $spreadsheetReaderFactory;

    /**
     * @var \SprykerDemo\Zed\ImportProcessGoogleSheets\ImportProcessGoogleSheetsConfig
     */
    protected ImportProcessGoogleSheetsConfig $importProcessGoogleSheetsConfig;

    /**
     * @param \SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Writer\ImportProcessGoogleSheetsCsvWriterInterface $importProcessGoogleSheetsCsvWriter
     * @param \SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Reader\SpreadsheetReaderFactoryInterface $spreadsheetReaderFactory
     * @param \SprykerDemo\Zed\ImportProcessGoogleSheets\ImportProcessGoogleSheetsConfig $importProcessGoogleSheetsConfig
     */
    public function __construct(
        ImportProcessGoogleSheetsCsvWriterInterface $importProcessGoogleSheetsCsvWriter,
        SpreadsheetReaderFactoryInterface $spreadsheetReaderFactory,
        ImportProcessGoogleSheetsConfig $importProcessGoogleSheetsConfig
    ) {
        $this->importProcessGoogleSheetsCsvWriter = $importProcessGoogleSheetsCsvWriter;
        $this->spreadsheetReaderFactory = $spreadsheetReaderFactory;
        $this->importProcessGoogleSheetsConfig = $importProcessGoogleSheetsConfig;
    }

    /**
     * @param \Generated\Shared\Transfer\ImportProcessSpreadsheetReaderConfigurationTransfer $importProcessSpreadsheetReaderConfigurationTransfer
     *
     * @return \Generated\Shared\Transfer\ImportProcessSpreadsheetDataFileTransfer
     */
    public function downloadSheetContent(
        ImportProcessSpreadsheetReaderConfigurationTransfer $importProcessSpreadsheetReaderConfigurationTransfer
    ): ImportProcessSpreadsheetDataFileTransfer {
        $spreadsheetReader = $this->getSpreadsheetReader(
            $importProcessSpreadsheetReaderConfigurationTransfer->getSpreadsheetUrl(),
            $importProcessSpreadsheetReaderConfigurationTransfer->getSheetName(),
        );

        $importProcessSpreadsheetDataFileTransfer = (new ImportProcessSpreadsheetDataFileTransfer())
            ->setSheetUrl($importProcessSpreadsheetReaderConfigurationTransfer->getSpreadsheetUrl())
            ->setSheetName($importProcessSpreadsheetReaderConfigurationTransfer->getSheetName());

        return $this->importProcessGoogleSheetsCsvWriter->writeData(
            $importProcessSpreadsheetDataFileTransfer,
            $spreadsheetReader,
        );
    }

    /**
     * @param string $spreadsheetUrl
     * @param string $sheetName
     *
     * @return \SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Reader\SpreadsheetReaderInterface
     */
    protected function getSpreadsheetReader(string $spreadsheetUrl, string $sheetName): SpreadsheetReaderInterface
    {
        $spreadsheetReaderConfigurationTransfer = (new ImportProcessSpreadsheetReaderConfigurationTransfer())
            ->setSpreadsheetUrl($spreadsheetUrl)
            ->setSheetName($sheetName)
            ->setBatchSize($this->importProcessGoogleSheetsConfig->getSpreadsheetReadChunkSize());

        return $this->spreadsheetReaderFactory->createReader($spreadsheetReaderConfigurationTransfer);
    }
}
