<?php

namespace Nineteen02\Customer\Controller\Index;

class ProductType extends \Magento\Framework\App\Action\Action
{

    /**
     * @param \Magento\Catalog\Api\ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @param \Magento\Framework\Api\SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        parent::__construct($context);
    }

    public function execute()
    {
        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilter(\Magento\Catalog\Api\Data\ProductInterface::TYPE_ID, \Magento\Bundle\Model\Product\Type::TYPE_CODE)
            ->create();

        $items = $this->productRepository->getList($searchCriteria)->getItems();
        foreach ($items as $item) {
            var_dump($item->getData());
        }
    }
}
