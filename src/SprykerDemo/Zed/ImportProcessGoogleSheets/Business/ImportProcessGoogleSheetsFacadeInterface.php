<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ImportProcessGoogleSheets\Business;

use Generated\Shared\Transfer\ImportProcessDataImportConfigurationCollectionTransfer;
use Generated\Shared\Transfer\ImportProcessTransfer;

interface ImportProcessGoogleSheetsFacadeInterface
{
    /**
     * Specification:
     * - Creates Google sheets import process.
     *
     * @api
     *
     * @param string $spreadsheetUrl
     * @param array<string> $sheetNames
     *
     * @return \Generated\Shared\Transfer\ImportProcessTransfer
     */
    public function createImportProcess(string $spreadsheetUrl, array $sheetNames): ImportProcessTransfer;

    /**
     * Specification:
     * - Saves sheet content to a temporary CSV file.
     * - Returns data import configuration transfer containing the path to temporary CSV file as source for data import.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ImportProcessTransfer $importProcessTransfer
     *
     * @return \Generated\Shared\Transfer\ImportProcessDataImportConfigurationCollectionTransfer
     */
    public function buildDataImportConfigurations(
        ImportProcessTransfer $importProcessTransfer
    ): ImportProcessDataImportConfigurationCollectionTransfer;

    /**
     * Specification:
     * - Cleans up temporary CSV files.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ImportProcessDataImportConfigurationCollectionTransfer $dataImportConfigurationCollectionTransfer
     *
     * @return void
     */
    public function cleanupImportProcessPayloadData(
        ImportProcessDataImportConfigurationCollectionTransfer $dataImportConfigurationCollectionTransfer
    ): void;

    /**
     * Specification:
     * - Gets applicable sorted import types.
     *
     * @api
     *
     * @return array<string>
     */
    public function getAllowedImportTypes(): array;
}
