<?php
namespace Dean\Review\Plugin\Magento\Review\Block\Product;

/**
 * Class View
 */
class View
{
    /**
     * Review collection
     *
     * @var ReviewCollection
     */
    protected $_reviewsCollection;

    /**
     * Review resource model
     *
     * @var \Magento\Review\Model\ResourceModel\Review\CollectionFactory
     */
    protected $_reviewsColFactory;

    /**
     * Store manager
     *
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    public function __construct(
        \Magento\Review\Model\ResourceModel\Review\CollectionFactory $collectionFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManagerInterface
    ) {
        $this->_reviewsColFactory = $collectionFactory;
        $this->_storeManager = $storeManagerInterface;
    }
    //function beforeMETHOD($subject, $arg1, $arg2){}
    //function aroundMETHOD($subject, $proceed, $arg1, $arg2){return $proceed($arg1, $arg2);}
    // function afterGetReviewsCollection(\Magento\Review\Block\Product\View $subject, $result) {
    function aroundGetReviewsCollection(\Magento\Review\Block\Product\View $subject, $proceed) {
        if (null === $this->_reviewsCollection) {
            $seeAll = $subject->getRequest()->getParam('see_all', null);

            $this->_reviewsCollection = $this->_reviewsColFactory->create()->addStoreFilter(
                $this->_storeManager->getStore()->getId()
            )->addEntityFilter(
                'product',
                $subject->getProduct()->getId()
            )->setDateOrder();

            if (!isset($seeAll)) {
                $this->_reviewsCollection->addStatusFilter(\Magento\Review\Model\Review::STATUS_APPROVED);
            }
        }
        return $this->_reviewsCollection;

        // return $result;
    }
}
