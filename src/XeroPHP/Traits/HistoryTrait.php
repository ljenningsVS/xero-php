<?php

namespace XeroPHP_VS\Traits;

use XeroPHP_VS\Models\Accounting\History;
use XeroPHP_VS\Remote\Request;
use XeroPHP_VS\Remote\URL;
use XeroPHP_VS\Exception;
use XeroPHP_VS\Helpers;

trait HistoryTrait
{
    public function addHistory(History $history)
    {
        /**
         * @var \XeroPHP_VS\Remote\Model $this
         */
        $uri = sprintf('%s/%s/History', $this::getResourceURI(), $this->getGUID());

        $url = new URL($this->_application, $uri);
        $request = new Request($this->_application, $url, Request::METHOD_POST);

        $request->setBody(Helpers::arrayToXML(['HistoryRecords' => [($history->toStringArray())]]));
        $request->send();

        $response = $request->getResponse();

        return $this;
    }

    public function getHistory()
    {
        /**
         * @var \XeroPHP_VS\Remote\Model $this
         */
        if ($this->hasGUID() === false) {
            throw new Exception(
                'History/Notes are only available to objects that exist remotely.'
            );
        }

        $uri = sprintf(
            '%s/%s/History',
            $this::getResourceURI(),
            $this->getGUID()
        );

        $url = new URL($this->_application, $uri);
        $request = new Request($this->_application, $url, Request::METHOD_GET);
        $request->send();

        $historyEntries = [];
        foreach ($request->getResponse()->getElements() as $element) {
            $history = new History($this->_application);
            $history->fromStringArray($element);
            $historyEntries[] = $history;
        }

        return $historyEntries;
    }
}
