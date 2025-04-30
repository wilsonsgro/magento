<?php
namespace Reply\Example\Model\Api;

use Reply\Example\Api\GraphqlRepositoryInterface;
use Reply\Example\Api\GraphqlCutstomInterfaceFactory;
/**
 * Class GraphqlRepository
 */
class GraphqlRepository implements GraphqlRepositoryInterface
{
    /**
     * @var GraphqlCutstomInterfaceFactory
     */
    private $graphqlCutstomInterfaceFactory;
    /**
     * @param GraphqlCutstomInterfaceFactory $graphqlCutstomInterfaceFactory
     */
    public function __construct(
        GraphqlCutstomInterfaceFactory $graphqlCutstomInterfaceFactory
    ) {
        $this->graphqlCutstomInterfaceFactory = $graphqlCutstomInterfaceFactory;
    }
    /**
     * {@inheritDoc}
     *
     * @param string $input
     * @return GraphqlCutstomInterface
     * @throws NoSuchEntityException
     */
    public function getExecute(string $input) : mixed
    {
        /** @var GraphqlCutstomInterface $graphqlCutstom */
        $graphqlCutstom = $this->graphqlCutstomInterfaceFactory->create();
        $graphqlCutstom->setExecute($input);
        return $graphqlCutstom;
    }    
    /*
        curl --request POST \
        --url http://local.magento.it/it/rest/V1/rest_example/graphql \
        --header 'Authorization: Bearer eyJraWQiOiIxIiwiYWxnIjoiSFMyNTYifQ.eyJ1aWQiOjEsInV0eXBpZCI6MiwiaWF0IjoxNzQ2MDA5NTY4LCJleHAiOjE3NDYwMTMxNjh9.6UJwpZ8mbtbr-2LZCgpnUihD4N72aZJE7Dut0gS9TLw' \
        --header 'Content-Type: application/json' \
        --data ' {
                "input": "SGEN17416"
            }
        '
    */
}
