<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Creator;

use Generated\Shared\Transfer\ImportProcessPayloadTransfer;
use Generated\Shared\Transfer\ImportProcessTransfer;
use SprykerDemo\Zed\ImportProcess\Business\ImportProcessFacadeInterface;
use SprykerDemo\Zed\ImportProcessGoogleSheets\ImportProcessGoogleSheetsConfig;

class ImportProcessGoogleSheetsProcessCreator implements ImportProcessGoogleSheetsProcessCreatorInterface
{
    /**
     * @var \SprykerDemo\Zed\ImportProcess\Business\ImportProcessFacadeInterface
     */
    protected ImportProcessFacadeInterface $importProcessFacade;

    /**
     * @var \SprykerDemo\Zed\ImportProcessGoogleSheets\ImportProcessGoogleSheetsConfig
     */
    protected ImportProcessGoogleSheetsConfig $config;

    /**
     * @param \SprykerDemo\Zed\ImportProcess\Business\ImportProcessFacadeInterface $importProcessFacade
     * @param \SprykerDemo\Zed\ImportProcessGoogleSheets\ImportProcessGoogleSheetsConfig $config
     */
    public function __construct(
        ImportProcessFacadeInterface $importProcessFacade,
        ImportProcessGoogleSheetsConfig $config
    ) {
        $this->importProcessFacade = $importProcessFacade;
        $this->config = $config;
    }

    /**
     * @param string $spreadsheetUrl
     * @param array<string> $sheetNames
     *
     * @return \Generated\Shared\Transfer\ImportProcessTransfer
     */
    public function createImportProcess(string $spreadsheetUrl, array $sheetNames): ImportProcessTransfer
    {
        $importProcessPayloadTransfer = new ImportProcessPayloadTransfer();
        $importProcessPayloadTransfer->setImportProcessType($this->config->getSourceType());
        $importProcessPayloadTransfer->setSource($spreadsheetUrl);
        $importProcessPayloadTransfer->setDataImportTypes(
            $this->filterAllowedSheetNames($sheetNames),
        );

        return $this->importProcessFacade->createImportProcess($importProcessPayloadTransfer);
    }

    /**
     * @param array<string> $sheetNames
     *
     * @return array<string>
     */
    protected function filterAllowedSheetNames(array $sheetNames): array
    {
        $allowedSheetNames = array_intersect($this->config->getAllowedImportTypes(), $sheetNames);

        return array_values($allowedSheetNames);
    }
}
