<?php
namespace Reply\Example\Api;

interface GraphqlRepositoryInterface
{
    /**
     * Return a GraphqlCutstom
     *
     * @param string $input
     * @return \Reply\Example\Api\GraphqlCutstomInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getExecute(string $input);
}
