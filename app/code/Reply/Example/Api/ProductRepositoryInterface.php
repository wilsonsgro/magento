<?php
namespace Reply\Example\Api;

interface ProductRepositoryInterface
{
    /**
     * Return a filtered product.
     *
     * @param int $id
     * @return \Reply\Example\Api\ResponseItemInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getItem(int $id);
    /**
     * Set descriptions for the products.
     *
     * @param \Reply\Example\Api\RequestItemInterface[] $products
     * @return void
     */
    public function setDescription(array $products);
}
