<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Builder;

use Generated\Shared\Transfer\ImportProcessDataImportConfigurationCollectionTransfer;
use Generated\Shared\Transfer\ImportProcessTransfer;

interface ImportProcessGoogleSheetsDataImportConfigurationBuilderInterface
{
    /**
     * @param \Generated\Shared\Transfer\ImportProcessTransfer $importProcessTransfer
     *
     * @return \Generated\Shared\Transfer\ImportProcessDataImportConfigurationCollectionTransfer
     */
    public function buildDataImportConfigurations(
        ImportProcessTransfer $importProcessTransfer
    ): ImportProcessDataImportConfigurationCollectionTransfer;
}
