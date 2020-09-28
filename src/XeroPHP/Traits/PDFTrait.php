<?php

namespace XeroPHP_VS\Traits;

use XeroPHP_VS\Exception;
use XeroPHP_VS\Remote\URL;
use XeroPHP_VS\Remote\Request;

trait PDFTrait
{
    /**
     * Get the raw content of the resource's PDF file.
     *
     * @return string
     * @throws \XeroPHP_VS\Exception
     */
    public function getPDF()
    {
        if (!$this->hasGUID()) {
            throw new Exception('PDF files are only available to objects that exist remotely.');
        }

        return $this->buildPDFRequest()->send()->getResponseBody();
    }

    /**
     * Build a request for the resources PDF.
     *
     * @return \XeroPHP_VS\Remote\Request
     */
    protected function buildPDFRequest()
    {
        return (new Request(
            $this->getApplication(),
            $this->buildPDFURL(),
            Request::METHOD_GET
        ))->setHeader(
            Request::HEADER_ACCEPT,
            Request::CONTENT_TYPE_PDF
        );
    }

    /**
     * Build a URL to the resource's PDF.
     *
     * @return \XeroPHP_VS\Remote\URL
     */
    protected function buildPDFURL()
    {
        return new URL(
            $this->getApplication(),
            static::getResourceURI().'/'.$this->getGUID()
        );
    }

    /**
     * Get the resource's application.
     *
     * @return \XeroPHP_VS\Application
     */
    abstract protected function getApplication();

    /**
     * Get the resource's URI.
     *
     * @return string
     */
    // abstract public static function getResourceURI();

    /**
     * Determine if the resource has a GUID.
     *
     * @return bool
     */
    abstract public function hasGUID();

    /**
     * Get the resource's GUID.
     *
     * @return string
     */
    abstract public function getGUID();
}
