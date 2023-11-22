<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ImportProcessGoogleSheets\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use SprykerDemo\Service\GoogleSheets\GoogleSheetsServiceInterface;
use SprykerDemo\Zed\ImportProcess\Business\ImportProcessFacadeInterface;
use SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Builder\ImportProcessGoogleSheetsDataImportConfigurationBuilder;
use SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Builder\ImportProcessGoogleSheetsDataImportConfigurationBuilderInterface;
use SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Creator\ImportProcessGoogleSheetsProcessCreator;
use SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Creator\ImportProcessGoogleSheetsProcessCreatorInterface;
use SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Deleter\ImportProcessPayloadDataDeleter;
use SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Downloader\ImportProcessGoogleSheetsDownloader;
use SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Downloader\ImportProcessGoogleSheetsDownloaderInterface;
use SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Reader\SpreadsheetReaderFactory;
use SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Reader\SpreadsheetReaderFactoryInterface;
use SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Writer\ImportProcessGoogleSheetsCsvWriter;
use SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Writer\ImportProcessGoogleSheetsCsvWriterInterface;
use SprykerDemo\Zed\ImportProcessGoogleSheets\ImportProcessGoogleSheetsDependencyProvider;

/**
 * @method \SprykerDemo\Zed\ImportProcessGoogleSheets\ImportProcessGoogleSheetsConfig getConfig()
 */
class ImportProcessGoogleSheetsBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Creator\ImportProcessGoogleSheetsProcessCreatorInterface
     */
    public function createImportProcessGoogleSheetsProcessCreator(): ImportProcessGoogleSheetsProcessCreatorInterface
    {
        return new ImportProcessGoogleSheetsProcessCreator(
            $this->getImportProcessFacade(),
            $this->getConfig(),
        );
    }

    /**
     * @return \SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Downloader\ImportProcessGoogleSheetsDownloaderInterface
     */
    public function createImportProcessPayloadDataDownloader(): ImportProcessGoogleSheetsDownloaderInterface
    {
        return new ImportProcessGoogleSheetsDownloader(
            $this->createImportProcessGoogleSheetsCsvWriter(),
            $this->createSpreadsheetReaderFactory(),
            $this->getConfig(),
        );
    }

    /**
     * @return \SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Writer\ImportProcessGoogleSheetsCsvWriterInterface
     */
    public function createImportProcessGoogleSheetsCsvWriter(): ImportProcessGoogleSheetsCsvWriterInterface
    {
        return new ImportProcessGoogleSheetsCsvWriter($this->getConfig());
    }

    /**
     * @return \SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Builder\ImportProcessGoogleSheetsDataImportConfigurationBuilderInterface
     */
    public function createImportProcessGoogleSheetsDataImportConfigurationBuilder(): ImportProcessGoogleSheetsDataImportConfigurationBuilderInterface
    {
        return new ImportProcessGoogleSheetsDataImportConfigurationBuilder(
            $this->createImportProcessPayloadDataDownloader(),
        );
    }

    /**
     * @return \SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Reader\SpreadsheetReaderFactoryInterface
     */
    public function createSpreadsheetReaderFactory(): SpreadsheetReaderFactoryInterface
    {
        return new SpreadsheetReaderFactory($this->getGoogleSheetsService());
    }

    /**
     * @return \SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Deleter\ImportProcessPayloadDataDeleter
     */
    public function createImportProcessPayloadDataDeleter(): ImportProcessPayloadDataDeleter
    {
        return new ImportProcessPayloadDataDeleter();
    }

    /**
     * @return \SprykerDemo\Zed\ImportProcess\Business\ImportProcessFacadeInterface
     */
    public function getImportProcessFacade(): ImportProcessFacadeInterface
    {
        return $this->getProvidedDependency(ImportProcessGoogleSheetsDependencyProvider::FACADE_IMPORT_PROCESS);
    }

    /**
     * @return \SprykerDemo\Service\GoogleSheets\GoogleSheetsServiceInterface
     */
    public function getGoogleSheetsService(): GoogleSheetsServiceInterface
    {
        return $this->getProvidedDependency(ImportProcessGoogleSheetsDependencyProvider::SERVICE_GOOGLE_SHEETS);
    }
}
