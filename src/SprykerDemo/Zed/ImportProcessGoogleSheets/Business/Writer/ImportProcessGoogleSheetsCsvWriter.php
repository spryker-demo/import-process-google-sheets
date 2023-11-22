<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Writer;

use Exception;
use Generated\Shared\Transfer\ImportProcessSpreadsheetDataFileTransfer;
use SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Exception\SpreadsheetsUrlException;
use SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Reader\SpreadsheetReaderInterface;
use SprykerDemo\Zed\ImportProcessGoogleSheets\ImportProcessGoogleSheetsConfig;

class ImportProcessGoogleSheetsCsvWriter implements ImportProcessGoogleSheetsCsvWriterInterface
{
    /**
     * @var string
     */
    protected const FILE_PATH_PATTERN = '%s/%s_%s.csv';

    /**
     * @var \SprykerDemo\Zed\ImportProcessGoogleSheets\ImportProcessGoogleSheetsConfig
     */
    protected ImportProcessGoogleSheetsConfig $importProcessGoogleSheetsConfig;

    /**
     * @param \SprykerDemo\Zed\ImportProcessGoogleSheets\ImportProcessGoogleSheetsConfig $importProcessGoogleSheetsConfig
     */
    public function __construct(ImportProcessGoogleSheetsConfig $importProcessGoogleSheetsConfig)
    {
        $this->importProcessGoogleSheetsConfig = $importProcessGoogleSheetsConfig;
    }

    /**
     * @param \Generated\Shared\Transfer\ImportProcessSpreadsheetDataFileTransfer $importProcessSpreadsheetDataFile
     * @param \SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Reader\SpreadsheetReaderInterface $spreadsheetReader
     *
     * @throws \Exception
     *
     * @return \Generated\Shared\Transfer\ImportProcessSpreadsheetDataFileTransfer
     */
    public function writeData(
        ImportProcessSpreadsheetDataFileTransfer $importProcessSpreadsheetDataFile,
        SpreadsheetReaderInterface $spreadsheetReader
    ): ImportProcessSpreadsheetDataFileTransfer {
        $filePath = $this->getFilePath($importProcessSpreadsheetDataFile);
        $importProcessSpreadsheetDataFile->setFilePath($filePath);

        $csvFile = fopen($filePath, 'w');
        if (!$csvFile) {
            throw new Exception(sprintf('Could not open file %s', $filePath));
        }

        foreach ($spreadsheetReader as $sheetRow) {
            fputcsv($csvFile, $sheetRow);
        }

        fclose($csvFile);

        return $importProcessSpreadsheetDataFile;
    }

    /**
     * @param \Generated\Shared\Transfer\ImportProcessSpreadsheetDataFileTransfer $importProcessSpreadsheetDataFileTransfer
     *
     * @return string
     */
    protected function getFilePath(ImportProcessSpreadsheetDataFileTransfer $importProcessSpreadsheetDataFileTransfer): string
    {
        if ($importProcessSpreadsheetDataFileTransfer->getFilePath()) {
            return $importProcessSpreadsheetDataFileTransfer->getFilePath();
        }

        $spreadsheetId = $this->getSpreadsheetIdFromUrl($importProcessSpreadsheetDataFileTransfer->getSheetUrlOrFail());

        return sprintf(
            static::FILE_PATH_PATTERN,
            $this->getSavePath(),
            $importProcessSpreadsheetDataFileTransfer->getSheetName(),
            $spreadsheetId,
        );
    }

    /**
     * @param string $spreadsheetUrl
     *
     * @throws \SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Exception\SpreadsheetsUrlException
     *
     * @return string
     */
    protected function getSpreadsheetIdFromUrl(string $spreadsheetUrl): string
    {
        $matches = [];

        preg_match('/(?<=\/spreadsheets\/d\/)[a-zA-Z0-9-_]+/', $spreadsheetUrl, $matches);
        $spreadsheetId = $matches[0] ?? null;

        if ($spreadsheetId === null) {
            throw new SpreadsheetsUrlException('Spreadsheet URL is incorrect');
        }

        return $spreadsheetId;
    }

    /**
     * @return string
     */
    protected function getSavePath(): string
    {
        $savePath = $this->importProcessGoogleSheetsConfig->getSpreadsheetCsvSaveFilePath();

        if (!is_dir($savePath)) {
            mkdir($savePath, 0777, true);
        }

        return $savePath;
    }
}
