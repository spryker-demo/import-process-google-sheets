<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ImportProcessGoogleSheets\Business\Reader;

use Iterator;

interface SpreadsheetReaderInterface extends Iterator
{
    /**
     * @return array<int, mixed>
     */
    public function current(): array;
}
