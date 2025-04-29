<?php

namespace Reply\Example\Controller\Graphql;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\GraphQL;
use GraphQL\Type\Schema;

use Magento\Framework\Controller\Result\JsonFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    # http://local.magento.it/it/reply/graphql/index
    private $resultJsonFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        JsonFactory $resultJsonFactory
    ) {
        $this->resultJsonFactory = $resultJsonFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $resultJson = $this->resultJsonFactory->create();

        $customer = [
            [
                "id" => 1,
                "firstname" => "John",
                "lastname" => "Doe",
                "age" => 14,
                "address" => [
                    "addressId" => 1,
                    "street" => ["street1" => "167", "street2" => "XX Floor"],
                    "city" => "New York",
                    "state" => "NY",
                    "country" => "USA",
                ],
            ],
            [
                "id" => 2,
                "firstname" => "chris",
                "lastname" => "Martin",
                "age" => 29,
                "address" => [
                    "addressId" => 2,
                    "street" => ["street1" => "167", "street2" => "XX Floor"],
                    "city" => "New York",
                    "state" => "NY",
                    "country" => "USA",
                ],
            ],
            [
                "id" => 3,
                "firstname" => "Jenny",
                "lastname" => "Ketty",
                "age" => 32,
                "address" => [
                    "addressId" => 3,
                    "street" => ["street1" => "167", "street2" => "XX Floor"],
                    "city" => "New York",
                    "state" => "NY",
                    "country" => "USA",
                ],
            ],
            [
                "id" => 4,
                "firstname" => "Jennifer",
                "lastname" => "Tim",
                "age" => 31,
                "address" => [
                    "addressId" => 4,
                    "street" => ["street1" => "167", "street2" => "XX Floor"],
                    "city" => "New York",
                    "state" => "NY",
                    "country" => "USA",
                ],
            ],
        ];

        $street = new ObjectType([
            "name" => "Street",
            "description" => "Customer Address from json object",
            "fields" => [
                "street1" => Type::string(),
                "street2" => Type::string(),
            ],
        ]);

        $address = new ObjectType([
            "name" => "Address",
            "description" => "Customer Address from json object",
            "fields" => [
                "addressId" => Type::int(),
                "state" => Type::string(),
                "city" => Type::string(),
                "street" => [
                    "type" => $street,
                    "resolve" => function ($root, $args, $context) {
                        return $root["street"];
                    },
                ],
                "country" => Type::string(),
            ],
        ]);

        $userType = new ObjectType([
            "name" => "Customer",
            "description" => "Customer from json object",
            "fields" => [
                "id" => Type::int(),
                "firstname" => Type::string(),
                "lastname" => Type::string(),
                "age" => Type::int(),
                "address" => [
                    "type" => $address,
                    "resolve" => function ($root, $args, $context) {
                        return $root["address"];
                    },
                ],
            ],
        ]);

        $queryType = new ObjectType([
            "name" => "Query",
            "fields" => [
                "customer" => [
                    "type" => $userType,
                    "args" => [
                        "id" => Type::int(),
                    ],
                    "resolve" => function ($root, $args) {
                        $returnArray = [];
                        foreach ($root as $key => $customer) {
                            if ($customer["id"] == $args["id"]) {
                                $returnArray = $customer;
                            }
                        }
                        return $returnArray;
                    },
                ],
            ],
        ]);

        $schema = new Schema([
            "query" => $queryType,
        ]);

        try {
            # request
            $query = "
            {
                customer(id: 3) {
                    id
                    firstname
                    lastname
                    address {
                        addressId
                        state
                        city
                        country
                        street {
                            street1
                            street2
                        }
                    }
                }
            }";

            $variableValues = [];
            $rootValue = $customer;
            $result = GraphQL::executeQuery(
                $schema,
                $query,
                $rootValue,
                null,
                $variableValues
            );
            
            $output = $result->toArray();
        } catch (\Exception $e) {
            return $resultJson->setData([
                "json_data" => json_encode([
                    "error" => [
                        "message" => $e->getMessage(),
                    ],
                ]),
            ]);
        }
        return $resultJson->setData(["json_data" => json_encode($output)]);
        /* response
            {
                "data": {
                    "customer": {
                    "id": 3,
                    "firstname": "Jenny",
                    "lastname": "Ketty",
                    "address": {
                        "addressId": 3,
                        "state": "NY",
                        "city": "New York",
                        "country": "USA",
                        "street": {
                        "street1": "167",
                        "street2": "XX Floor"
                        }
                    }
                    }
                }
            }
        */
    }
}
