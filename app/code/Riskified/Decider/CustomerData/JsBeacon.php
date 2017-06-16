<?php

namespace Riskified\Decider\CustomerData;

use Magento\Customer\CustomerData\SectionSourceInterface;
use Magento\Framework\Session\SessionManagerInterface;
use Riskified\Decider\Api\Config as ApiConfig;

/**
 * Riskified Decider js beacon customer data source object.
 *
 * @category Riskified
 * @package  Riskified_Decider
 * @author   Piotr Pierzak <piotrek.pierzak@gmail.com>
 */
class JsBeacon implements SectionSourceInterface
{
    /**
     * @var SessionManagerInterface
     */
    private $session;

    /**
     * @var ApiConfig
     */
    private $apiConfig;

    /**
     * JsBeacon constructor.
     *
     * @param SessionManagerInterface $session
     * @param ApiConfig               $apiConfig
     */
    public function __construct(
        SessionManagerInterface $session,
        ApiConfig $apiConfig
    ) {
        $this->session = $session;
        $this->apiConfig = $apiConfig;
    }

    /**
     * Get section data.
     *
     * @return array
     */
    public function getSectionData()
    {
        return [
            'isEnabled' => $this->apiConfig->isEnabled(),
            'sessionId' => $this->session->getSessionId(),
            'shopDomain' => $this->apiConfig->getShopDomain(),
            'statusControlActive' => $this->apiConfig->getConfigStatusControlActive(),
            'extensionVersion' => $this->apiConfig->getExtensionVersion(),
            'beaconUrl' => $this->apiConfig->getConfigBeaconUrl(),
        ];
    }
}
