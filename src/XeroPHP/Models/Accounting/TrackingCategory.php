<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

use XeroPHP\Models\Accounting\TrackingCategory\TrackingOption;

class TrackingCategory extends Remote\Object {

    /**
     * The Xero identifier for a tracking categorye.g. 297c2dc5-cc47-4afd-8ec8-74990b8761e9
     *
     * @property string TrackingCategoryID
     */

    /**
     * The name of the tracking category e.g. Department, Region
     *
     * @property string Name
     */

    /**
     * The status of a tracking category
     *
     * @property string Status
     */

    /**
     * See Tracking Options
     *
     * @property TrackingOption[] Options
     */



    /*
    * Get the resource uri of the class (Contacts) etc
    *
    * @return string
    */
    public static function getResourceURI(){
        return 'TrackingCategories';
    }


    /*
    * Get the root node name.  Just the unqualified classname
    *
    * @return string
    */
    public static function getRootNodeName(){
        return 'TrackingCategory';
    }


    /*
    * Get the guid property
    *
    * @return string
    */
    public static function getGUIDProperty(){
        return 'TrackingCategoryID';
    }


    /**
    * Get the stem of the API (core.xro) etc
    *
    * @return string|null
    */
    public static function getAPIStem(){
        return Remote\URL::API_CORE;
    }


    /*
    * Get the supported methods
    */
    public static function getSupportedMethods(){
        return array(
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_POST
        );
    }

    /**
     *
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Type
     *  [2] - PHP type
     *  [3] - Is an Array
     *
     * @return array
     */
    public static function getProperties(){
        return array(
            'TrackingCategoryID' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'Name' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'Status' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'Options' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\TrackingCategory\\TrackingOption', true)
        );
    }


    /**
     * @return string
     */
    public function getTrackingCategoryID(){
        return $this->_data['TrackingCategoryID'];
    }

    /**
     * @param string $value
     * @return TrackingCategory
     */
    public function setTrackingCategoryID($value){
        $this->_dirty['TrackingCategoryID'] = $this->_data['TrackingCategoryID'] != $value;
        $this->_data['TrackingCategoryID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(){
        return $this->_data['Name'];
    }

    /**
     * @param string $value
     * @return TrackingCategory
     */
    public function setName($value){
        $this->_dirty['Name'] = $this->_data['Name'] != $value;
        $this->_data['Name'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(){
        return $this->_data['Status'];
    }

    /**
     * @param string $value
     * @return TrackingCategory
     */
    public function setStatu($value){
        $this->_dirty['Status'] = $this->_data['Status'] != $value;
        $this->_data['Status'] = $value;
        return $this;
    }

    /**
     * @return TrackingOption
     */
    public function getOptions(){
        return $this->_data['Options'];
    }

    /**
     * @param TrackingOption[] $value
     * @return TrackingCategory
     */
    public function addOption(TrackingOption $value){
        $this->_dirty['Options'] = true;
        $this->_data['Options'][] = $value;
        return $this;
    }


}