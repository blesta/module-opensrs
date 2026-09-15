<?php

/**
 * OpenSRS Domain Forwarding Management
 *
 * @copyright Copyright (c) 2021, Phillips Data, Inc.
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package opensrs.commands
 */
class OpensrsDomainsForwarding
{
    /**
     * @var OpensrsApi
     */
    private $api;

    /**
     * Sets the API to use for communication
     *
     * @param OpensrsApi $api The API to use for communication
     */
    public function __construct(OpensrsApi $api)
    {
        $this->api = $api;
    }

    /**
     * Enables domain forwarding for the specified domain.
     *
     * @param array $vars An array of input params including:
     *  - domain The domain name
     * @return OpensrsResponse The response object
     */
    public function createDomainForwarding(array $vars): OpensrsResponse
    {
        return $this->api->submit('create_domain_forwarding', $vars);
    }

    /**
     * Gets the domain forwarding records configured for the specified domain.
     *
     * @param array $vars An array of input params including:
     *  - domain The domain name
     * @return OpensrsResponse The response object
     */
    public function getDomainForwarding(array $vars): OpensrsResponse
    {
        return $this->api->submit('get_domain_forwarding', $vars);
    }

    /**
     * Sets the domain forwarding records for the specified domain.
     *
     * @param array $vars An array of input params including:
     *  - domain The domain name
     *  - forwarding An array of forwarding records, each containing:
     *      - subdomain The third level of the domain name, such as www or ftp
     *      - destination_url The destination URL
     *      - enabled Whether the record is enabled (1) or not (0)
     *      - masked Whether the destination URL should be masked (1) or not (0)
     * @return OpensrsResponse The response object
     */
    public function setDomainForwarding(array $vars): OpensrsResponse
    {
        return $this->api->submit('set_domain_forwarding', $vars);
    }

    /**
     * Deletes domain forwarding for the specified domain.
     *
     * @param array $vars An array of input params including:
     *  - domain The domain name
     * @return OpensrsResponse The response object
     */
    public function deleteDomainForwarding(array $vars): OpensrsResponse
    {
        return $this->api->submit('delete_domain_forwarding', $vars);
    }
}
