<?php

namespace Mints\User\Ecommerce;

trait Ecommerce {
    use ItemPrices;
    use Locations;
    use OrderItemsGroups;
    use OrderStatuses;
    use Orders;
    use PriceList;
    use ProductTemplates;
    use ProductVariations;
    use Products;
    use ProductVersions;
    use Skus;
    use Taxes;
    use VariantOptions;
    use VariantValues;
    use Vouchers;
}