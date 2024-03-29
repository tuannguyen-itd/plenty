<?php

namespace Ceres\Wizard\ShopWizard\Config;

use Plenty\Modules\Item\Search\Models\SearchSettings;

/**
 * Class SearchConfig
 * @package Ceres\Wizard\ShopWizard\Config
 */
class SearchConfig
{
    private static $sortingSearchDefaultOptions = [
        "sortDataItemScore"              => "item.score",
        "sortDataRecommendedSorting"     => "default.recommended_sorting",
        "sortDataTopsellerAsc"           => "variation.position_asc",
        "sortDataTopsellerDesc"          => "variation.position_desc",
        "sortDataNameAsc"                => "texts.name1_asc",
        "sortDataNameDesc"               => "texts.name1_desc",
        "sortDataPriceAsc"               => "sorting.price.avg_asc",
        "sortDataPriceDesc"              => "sorting.price.avg_desc",
        "sortDataVariationCreatedAtDesc" => "variation.createdAt_desc",
        "sortDataVariationCreatedAtAsc"  => "variation.createdAt_asc",
        "sortDataAvailabilityAsc"        => "variation.availability.averageDays_asc",
        "sortDataAvailabilityDesc"       => "variation.availability.averageDays_desc",
        "sortDataVariationNumberAsc"     => "variation.number_asc",
        "sortDataVariationNumberDesc"    => "variation.number_desc",
        "sortDataVariationUpdatedAtAsc"  => "variation.updatedAt_asc",
        "sortDataVariationUpdatedAtDesc" => "variation.updatedAt_desc",
        "sortDataManufacturerAsc"        => "item.manufacturer.externalName_asc",
        "sortDataManufacturerDesc"       => "item.manufacturer.externalName_desc",
    ];


    private static $sortingFirstSearchOptions = [
        "sortDataItemScore"                               => "item.score",
        "sortingPriorityCategoryItemIdAsc"                => "item.id_asc",
        "sortingPriorityCategoryItemIdDesc"               => "item.id_desc",
        "sortingPriorityCategoryNameAsc"                  => "texts.name_asc",
        "sortingPriorityCategoryNameDesc"                 => "texts.name_desc",
        "sortingPriorityCategoryPriceAsc"                 => "sorting.price.avg_asc",
        "sortingPriorityCategoryPriceDesc"                => "sorting.price.avg_desc",
        "sortingPriorityCategoryVariationCreatedAtDesc"   => "variation.createdAt_desc",
        "sortingPriorityCategoryVariationCreatedAtAsc"    => "variation.createdAt_asc",
        "sortingPriorityCategoryVariationIdAsc"           => "variation.id_asc",
        "sortingPriorityCategoryVariationIdDesc"          => "variation.id_desc",
        "sortingPriorityCategoryVariationNumberAsc"       => "variation.number_asc",
        "sortingPriorityCategoryVariationNumberDesc"      => "variation.number_desc",
        "sortingPriorityCategoryAvailabilityAsc"          => "variation.availability.averageDays_asc",
        "sortingPriorityCategoryAvailabilityDesc"         => "variation.availability.averageDays_desc",
        "sortingPriorityCategoryVariationUpdatedAtAsc"    => "variation.updatedAt_asc",
        "sortingPriorityCategoryVariationUpdatedAtDesc"   => "variation.updatedAt_desc",
        "sortingPriorityCategoryVariationPositionAsc"     => "variation.position_asc",
        "sortingPriorityCategoryVariationPositionDesc"    => "variation.position_desc",
        "sortingPriorityCategoryManufacturerAsc"          => "item.manufacturer.externalName_asc",
        "sortingPriorityCategoryManufacturerDesc"         => "item.manufacturer.externalName_desc",
        "sortingPriorityCategoryManufacturerPositionAsc"  => "item.manufacturer.position_asc",
        "sortingPriorityCategoryManufacturerPositionDesc" => "item.manufacturer.position_desc",
        "sortingPriorityCategoryStockAsc"                 => "stock.net_asc",
        "sortingPriorityCategoryStockDesc"                => "stock.net_desc",
        "sortDataRandom"                                  => "item.random",
    ];

    private static $sortingOtherSearchOptions = [
        "sortingPriorityCategoryNotSelected"              => "notSelected",
        "sortDataItemScore"                               => "item.score",
        "sortingPriorityCategoryItemIdAsc"                => "item.id_asc",
        "sortingPriorityCategoryItemIdDesc"               => "item.id_desc",
        "sortingPriorityCategoryNameAsc"                  => "texts.name_asc",
        "sortingPriorityCategoryNameDesc"                 => "texts.name_desc",
        "sortingPriorityCategoryPriceAsc"                 => "sorting.price.avg_asc",
        "sortingPriorityCategoryPriceDesc"                => "sorting.price.avg_desc",
        "sortingPriorityCategoryVariationCreatedAtDesc"   => "variation.createdAt_desc",
        "sortingPriorityCategoryVariationCreatedAtAsc"    => "variation.createdAt_asc",
        "sortingPriorityCategoryVariationIdAsc"           => "variation.id_asc",
        "sortingPriorityCategoryVariationIdDesc"          => "variation.id_desc",
        "sortingPriorityCategoryVariationNumberAsc"       => "variation.number_asc",
        "sortingPriorityCategoryVariationNumberDesc"      => "variation.number_desc",
        "sortingPriorityCategoryAvailabilityAsc"          => "variation.availability.averageDays_asc",
        "sortingPriorityCategoryAvailabilityDesc"         => "variation.availability.averageDays_desc",
        "sortingPriorityCategoryVariationUpdatedAtAsc"    => "variation.updatedAt_asc",
        "sortingPriorityCategoryVariationUpdatedAtDesc"   => "variation.updatedAt_desc",
        "sortingPriorityCategoryVariationPositionAsc"     => "variation.position_asc",
        "sortingPriorityCategoryVariationPositionDesc"    => "variation.position_desc",
        "sortingPriorityCategoryManufacturerAsc"          => "item.manufacturer.externalName_asc",
        "sortingPriorityCategoryManufacturerDesc"         => "item.manufacturer.externalName_desc",
        "sortingPriorityCategoryManufacturerPositionAsc"  => "item.manufacturer.position_asc",
        "sortingPriorityCategoryManufacturerPositionDesc" => "item.manufacturer.position_desc",
        "sortingPriorityCategoryStockAsc"                 => "stock.net_asc",
        "sortingPriorityCategoryStockDesc"                => "stock.net_desc",
        "sortDataRandom"                                  => "item.random",
    ];

    private static $sortingOperatorOptions = [
        "searchOperatorOr" => 'or',
        "searchOperatorAnd" => 'and'
    ];

    /**
     * @return array
     */
    public static function getSearchFieldsOptions()
    {
        /** @var SearchSettings $searchSettings */
        $searchSettings = pluginApp(SearchSettings::class);

        $searchFieldsOptions = [
            'searchFieldSelectParameter' => ''
        ];

        foreach ($searchSettings->getDefaultFields() as $field) {
            $fieldName = $field['key'];
            $searchFieldsOptions['searchField'.ucfirst($fieldName)] = $fieldName;
        }

        return $searchFieldsOptions;
    }

    /**
     * @return array
     */
    public static function getSortingSearchDefaultOptions()
    {
        return self::$sortingSearchDefaultOptions;
    }

    /**
     * @return array
     */
    public static function getSortingFirstSearchOptions()
    {
        return self::$sortingFirstSearchOptions;
    }

    /**
     * @return array
     */
    public static function getSortingOtherSearchOptions()
    {
        return self::$sortingOtherSearchOptions;
    }

    public static function getSortingOperatorOptions()
    {
        return self::$sortingOperatorOptions;
    }
}
