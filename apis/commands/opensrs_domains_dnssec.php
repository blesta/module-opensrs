<?php
/**
 * OpenSRS DNSSEC Management
 *
 * OpenSRS handles DNSSEC via the provisioning modify command with data => 'dnssec'.
 *
 * @copyright Copyright (c) 2021, Phillips Data, Inc.
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @package opensrs.commands
 */
class OpensrsDomainsDnssec
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
     * Gets the DNSSEC DS records for a domain.
     *
     * @param array $vars An array of input params including:
     *  - domain The domain name
     * @return OpensrsResponse The response object
     */
    public function getDnssecRecords(array $vars) : OpensrsResponse
    {
        return $this->api->submit('get', array_merge($vars, [
            'type' => 'domain_auth_info'
        ]));
    }

    /**
     * Adds a DNSSEC DS record to a domain.
     *
     * @param array $vars An array of input params including:
     *  - domain The domain name
     *  - dnssec Array of DS records, each containing:
     *    - key_tag The key tag
     *    - algorithm The algorithm number
     *    - digest_type The digest type
     *    - digest The digest value
     * @return OpensrsResponse The response object
     */
    public function addDnssecRecord(array $vars) : OpensrsResponse
    {
        return $this->api->submit('modify', array_merge($vars, [
            'data' => 'dnssec',
            'affect_domains' => '0'
        ]));
    }

    /**
     * Removes DNSSEC DS records from a domain.
     *
     * @param array $vars An array of input params including:
     *  - domain The domain name
     *  - dnssec Empty array to clear all DS records
     * @return OpensrsResponse The response object
     */
    public function removeDnssecRecord(array $vars) : OpensrsResponse
    {
        return $this->api->submit('modify', array_merge($vars, [
            'data' => 'dnssec',
            'affect_domains' => '0'
        ]));
    }
}
