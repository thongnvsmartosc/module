<?php
namespace Magento\InventoryConfiguration\Model\GetLegacyStockItem;

/**
 * Interceptor class for @see \Magento\InventoryConfiguration\Model\GetLegacyStockItem
 */
class Interceptor extends \Magento\InventoryConfiguration\Model\GetLegacyStockItem implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\CatalogInventory\Api\Data\StockItemInterfaceFactory $stockItemFactory, \Magento\CatalogInventory\Api\StockItemCriteriaInterfaceFactory $legacyStockItemCriteriaFactory, \Magento\CatalogInventory\Api\StockItemRepositoryInterface $legacyStockItemRepository, \Magento\InventoryCatalogApi\Model\GetProductIdsBySkusInterface $getProductIdsBySkus)
    {
        $this->___init();
        parent::__construct($stockItemFactory, $legacyStockItemCriteriaFactory, $legacyStockItemRepository, $getProductIdsBySkus);
    }

    /**
     * {@inheritdoc}
     */
    public function execute(string $sku) : \Magento\CatalogInventory\Api\Data\StockItemInterface
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        if (!$pluginInfo) {
            return parent::execute($sku);
        } else {
            return $this->___callPlugins('execute', func_get_args(), $pluginInfo);
        }
    }
}
