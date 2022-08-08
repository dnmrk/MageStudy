<?php
namespace Nineteen02\Customer\Api;

use Nineteen02\Customer\Api\Data\ExternalLinkInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface ExternalLinkRepositoryInterface
 *
 * @api
 */
interface ExternalLinkRepositoryInterface
{
    /**
     * Create or update a ExternalLink.
     *
     * @param ExternalLinkInterface $page
     * @return ExternalLinkInterface
     */
    public function save(ExternalLinkInterface $page);

    /**
     * Get a ExternalLink by Id
     *
     * @param int $id
     * @return ExternalLinkInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If ExternalLink with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($id);

    /**
     * Retrieve ExternalLinks which match a specified criteria.
     *
     * @param SearchCriteriaInterface $criteria
     */
    public function getList(SearchCriteriaInterface $criteria);

    /**
     * Delete a ExternalLink
     *
     * @param ExternalLinkInterface $page
     * @return ExternalLinkInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If ExternalLink with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(ExternalLinkInterface $page);

    /**
     * Delete a ExternalLink by Id
     *
     * @param int $id
     * @return ExternalLinkInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If customer with the specified ID does not exist.
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id);
}
