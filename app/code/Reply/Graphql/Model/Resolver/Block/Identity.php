<?php

namespace Reply\Graphql\Model\Resolver\Block;

use Magento\Framework\GraphQl\Query\Resolver\IdentityInterface;

class Identity implements IdentityInterface
{
    /** @var string */
    private $cacheTag = "reply_graphQL_custom_product";

    /**
     * Get PromoBanners identities from resolved data
     *
     * @param array $resolvedData
     * @return string[]
     */

    public function getIdentities(array $resolvedData): array
    {
        return [ $this->cacheTag ];
    }

}