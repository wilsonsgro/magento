<?php
namespace Reply\Example\Model\Api;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\GraphQL;
use GraphQL\Type\Schema;
use Reply\Example\Api\GraphqlCutstomInterface;
use Magento\Framework\DataObject;
/**
 * Class GraphqlCutstom
 */
class GraphqlCutstom extends DataObject implements GraphqlCutstomInterface
{
    public function getExecute() : string
    {
        return $this->_getData(self::DATA_EXECUTE);
    }
    /**
     * @param string $input
     * @return $this
     */
    public function setExecute(string $input) : mixed
    {
        return $this->setData(self::DATA_EXECUTE, $input);
    }
}
