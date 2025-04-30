<?php
namespace Reply\Example\Api;

interface GraphqlCutstomInterface
{
    const DATA_EXECUTE = 'execute';
    /**
     * @return string
     */
    public function getExecute();
    /**
     * @param string $input
     * @return $this
     */
    public function setExecute(string $input);
}
