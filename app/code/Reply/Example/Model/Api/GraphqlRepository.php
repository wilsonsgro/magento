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
}
