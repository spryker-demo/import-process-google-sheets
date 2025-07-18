<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ImportProcessGoogleSheets;

use Spryker\Zed\Kernel\AbstractBundleConfig;

class ImportProcessGoogleSheetsConfig extends AbstractBundleConfig
{
    /**
     * @var string
     */
    protected const SOURCE_TYPE = 'spreadsheet';

    /**
     * @var int
     */
    protected const SPREADSHEET_READ_CHUNK_SIZE = 1000;

    /**
     * @var string
     */
    protected const IMPORT_TYPE_CATEGORY = 'category';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_CATEGORY_STORE = 'category-store';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_CATEGORY_TEMPLATE = 'category-template';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_DIVIDED_PRODUCT_ABSTRACT = 'divided-product-abstract';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_DIVIDED_PRODUCT_ABSTRACT_LOCALIZED_ATTRIBUTES = 'divided-product-abstract-localized-attributes';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_DIVIDED_PRODUCT_ABSTRACT_MAIN_ATTRIBUTES = 'divided-product-abstract-main-attributes';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_DIVIDED_PRODUCT_ABSTRACT_URL = 'divided-product-abstract-url';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_MERCHANT = 'merchant';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_MERCHANT_CATEGORY = 'merchant-category';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_MERCHANT_OPENING_HOURS_DATE_SCHEDULE = 'merchant-opening-hours-date-schedule';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_MERCHANT_OPENING_HOURS_WEEKDAY_SCHEDULE = 'merchant-opening-hours-weekday-schedule';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_MERCHANT_PROFILE = 'merchant-profile';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_MERCHANT_PROFILE_ADDRESS = 'merchant-profile-address';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_MERCHANT_PRODUCT = 'merchant-product';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_MERCHANT_PRODUCT_APPROVAL_STATUS_DEFAULT = 'merchant-product-approval-status-default';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_MERCHANT_PRODUCT_OFFER = 'merchant-product-offer';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_MERCHANT_PRODUCT_OFFER_STORE = 'merchant-product-offer-store';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_MERCHANT_STOCK = 'merchant-stock';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_MERCHANT_STORE = 'merchant-store';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_MERCHANT_USER = 'merchant-user';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_OFFER_STOCK = 'product-offer-stock';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRICE_PRODUCT_OFFER = 'price-product-offer';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_ABSTRACT = 'product-abstract';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_ABSTRACT_STORE = 'product-abstract-store';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_ALTERNATIVE = 'product-alternative';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_APPROVAL_STATUS = 'product-approval-status';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_ATTRIBUTE_KEY = 'product-attribute-key';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_CONCRETE = 'product-concrete';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_DISCONTINUED = 'product-discontinued';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_GROUP = 'product-group';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_IMAGE = 'product-image';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_LABEL = 'product-label';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_LABEL_STORE = 'product-label-store';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_MANAGEMENT_ATTRIBUTE = 'product-management-attribute';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_PACKAGING_UNIT = 'product-packaging-unit';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_PACKAGING_UNIT_TYPE = 'product-packaging-unit-type';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_MEASUREMENT_UNIT = 'product-measurement-unit';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_MEASUREMENT_BASE_UNIT = 'product-measurement-base-unit';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_MEASUREMENT_SALES_UNIT = 'product-measurement-sales-unit';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_MEASUREMENT_SALES_UNIT_STORE = 'product-measurement-sales-unit-store';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_OPTION = 'product-option';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_OPTION_PRICE = 'product-option-price';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_PRICE = 'product-price';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_QUANTITY = 'product-quantity';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_RELATION = 'product-relation';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_PRODUCT_STOCK = 'product-stock';

    /**
     * @var string
     */
    protected const IMPORT_TYPE_STOCK = 'stock';

    /**
     * Specification:
     * - Gets applicable sorted import types.
     *
     * @api
     *
     * @return array<string>
     */
    public function getAllowedImportTypes(): array
    {
        return [
            static::IMPORT_TYPE_CATEGORY,
            static::IMPORT_TYPE_CATEGORY_STORE,
            static::IMPORT_TYPE_CATEGORY_TEMPLATE,
            static::IMPORT_TYPE_DIVIDED_PRODUCT_ABSTRACT,
            static::IMPORT_TYPE_DIVIDED_PRODUCT_ABSTRACT_LOCALIZED_ATTRIBUTES,
            static::IMPORT_TYPE_DIVIDED_PRODUCT_ABSTRACT_MAIN_ATTRIBUTES,
            static::IMPORT_TYPE_DIVIDED_PRODUCT_ABSTRACT_URL,
            static::IMPORT_TYPE_MERCHANT,
            static::IMPORT_TYPE_MERCHANT_CATEGORY,
            static::IMPORT_TYPE_MERCHANT_OPENING_HOURS_DATE_SCHEDULE,
            static::IMPORT_TYPE_MERCHANT_OPENING_HOURS_WEEKDAY_SCHEDULE,
            static::IMPORT_TYPE_MERCHANT_PROFILE,
            static::IMPORT_TYPE_MERCHANT_PROFILE_ADDRESS,
            static::IMPORT_TYPE_MERCHANT_PRODUCT,
            static::IMPORT_TYPE_MERCHANT_PRODUCT_APPROVAL_STATUS_DEFAULT,
            static::IMPORT_TYPE_MERCHANT_PRODUCT_OFFER,
            static::IMPORT_TYPE_MERCHANT_PRODUCT_OFFER_STORE,
            static::IMPORT_TYPE_MERCHANT_STOCK,
            static::IMPORT_TYPE_MERCHANT_STORE,
            static::IMPORT_TYPE_MERCHANT_USER,
            static::IMPORT_TYPE_PRICE_PRODUCT_OFFER,
            static::IMPORT_TYPE_PRODUCT_ABSTRACT,
            static::IMPORT_TYPE_PRODUCT_ABSTRACT_STORE,
            static::IMPORT_TYPE_PRODUCT_ALTERNATIVE,
            static::IMPORT_TYPE_PRODUCT_APPROVAL_STATUS,
            static::IMPORT_TYPE_PRODUCT_ATTRIBUTE_KEY,
            static::IMPORT_TYPE_PRODUCT_CONCRETE,
            static::IMPORT_TYPE_PRODUCT_DISCONTINUED,
            static::IMPORT_TYPE_PRODUCT_GROUP,
            static::IMPORT_TYPE_PRODUCT_IMAGE,
            static::IMPORT_TYPE_PRODUCT_LABEL,
            static::IMPORT_TYPE_PRODUCT_LABEL_STORE,
            static::IMPORT_TYPE_PRODUCT_MANAGEMENT_ATTRIBUTE,
            static::IMPORT_TYPE_PRODUCT_MEASUREMENT_UNIT,
            static::IMPORT_TYPE_PRODUCT_PACKAGING_UNIT,
            static::IMPORT_TYPE_PRODUCT_PACKAGING_UNIT_TYPE,
            static::IMPORT_TYPE_PRODUCT_MEASUREMENT_BASE_UNIT,
            static::IMPORT_TYPE_PRODUCT_MEASUREMENT_SALES_UNIT,
            static::IMPORT_TYPE_PRODUCT_MEASUREMENT_SALES_UNIT_STORE,
            static::IMPORT_TYPE_PRODUCT_OPTION,
            static::IMPORT_TYPE_PRODUCT_OPTION_PRICE,
            static::IMPORT_TYPE_PRODUCT_PRICE,
            static::IMPORT_TYPE_PRODUCT_QUANTITY,
            static::IMPORT_TYPE_PRODUCT_STOCK,
            static::IMPORT_TYPE_PRODUCT_OFFER_STOCK,
            static::IMPORT_TYPE_PRODUCT_RELATION,
            static::IMPORT_TYPE_STOCK,
        ];
    }

    /**
     * @api
     *
     * @return string
     */
    public function getSourceType(): string
    {
        return static::SOURCE_TYPE;
    }

    /**
     * @api
     *
     * @return int
     */
    public function getSpreadsheetReadChunkSize(): int
    {
        return static::SPREADSHEET_READ_CHUNK_SIZE;
    }

    /**
     * @api
     *
     * @return string
     */
    public function getSpreadsheetCsvSaveFilePath(): string
    {
        return APPLICATION_ROOT_DIR . '/data/tmp/import-process';
    }
}
