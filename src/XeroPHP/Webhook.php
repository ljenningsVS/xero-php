<?php

namespace XeroPHP_VS;

use XeroPHP_VS\Helpers;

class Webhook
{
    /**
     * @var \XeroPHP_VS\Application
     */
    private $application;
    /**
     * @var string
     */
    private $key;
    /**
     * @var string
     */
    private $rawPayload;
    /**
     * @var array
     */
    private $payload;
    /**
     * @var string
     */
    private $webhookEvent;

    /**
     * @param \XeroPHP_VS\Application $application
     * @param string $payload
     * @param string|null $event
     * @return void
     * @throws \XeroPHP_VS\Application\Exception
     */
    public function __construct($application, $payload, $event = null)
    {
        $this->application = $application;
        $this->rawPayload = $payload;
        $this->key = $application->getConfigOption('webhook', 'signing_key');
        $this->payload = json_decode($this->rawPayload, true);
        if ($event === null) {
            $event = Webhook\Event::class;
        }
        $this->webhookEvent = $event;

        // bail if json_decode fails
        if ($this->payload === null) {
            throw new Application\Exception("The webhook payload could not be decoded: ".json_last_error_msg());
        }

        // bail if we don't have all the fields we are expecting
        if (!isset($this->payload['events']) or
            !isset($this->payload['firstEventSequence']) or
            !isset($this->payload['lastEventSequence'])) {
            throw new Application\Exception("The webhook payload was malformed");
        }
    }

    /**
     * @return \XeroPHP_VS\Application
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * @return string
     */
    public function getSignature()
    {
        return base64_encode(hash_hmac('sha256', $this->rawPayload, $this->key, true));
    }

    /**
     * @param string $signature
     * @return bool
     */
    public function validate($signature)
    {
        return Helpers::hashEquals($this->getSignature(), $signature);
    }

    /**
     * @return int
     */
    public function getFirstEventSequence()
    {
        return $this->payload['firstEventSequence'];
    }

    /**
     * @return int
     */
    public function getLastEventSequence()
    {
        return $this->payload['lastEventSequence'];
    }

    /**
     * @return \XeroPHP_VS\Webhook\Event[]
     */
    public function getEvents()
    {
        $result = [];
        foreach ($this->payload['events'] as $event) {
            $result[] = new $this->webhookEvent($this, $event);
        }

        return $result;
    }
}
