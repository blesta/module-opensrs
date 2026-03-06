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
     * Gets domain forwarding settings for the specified domain.
     *
     * @param array $vars An array of input params including:
     *  - domain The domain name
     * @return OpensrsResponse The response object
     */
    public function getDomainForwarding(array $vars) : OpensrsResponse
    {
        return $this->api->submit('get', array_merge($vars, ['type' => 'forwarding_email']));
    }

    /**
     * Sets URL forwarding for the specified domain.
     *
     * @param array $vars An array of input params including:
     *  - domain The domain name
     *  - forwarding_uri The destination URL
     * @return OpensrsResponse The response object
     */
    public function setDomainForwarding(array $vars) : OpensrsResponse
    {
        return $this->api->submit('modify', array_merge($vars, [
            'data' => 'forwarding_email',
            'affect_domains' => '0'
        ]));
    }

    /**
     * Creates URL forwarding for the specified domain via DNS zone.
     *
     * @param array $vars An array of input params including:
     *  - source The source subdomain or @ for root
     *  - destination The destination URL
     *  - type The redirect type (301, 302, or frame)
     *  - domain The domain name
     * @return OpensrsResponse The response object
     */
    public function createDomainForwarding(array $vars) : OpensrsResponse
    {
        return $this->api->submit('set_dns_zone', $vars);
    }

    /**
     * Deletes URL forwarding for the specified domain.
     *
     * @param array $vars An array of input params including:
     *  - domain The domain name
     * @return OpensrsResponse The response object
     */
    public function deleteDomainForwarding(array $vars) : OpensrsResponse
    {
        return $this->api->submit('set_dns_zone', $vars);
    }
}
