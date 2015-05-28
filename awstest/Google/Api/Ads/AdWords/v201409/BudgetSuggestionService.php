<?php
/**
 * Contains all client objects for the BudgetSuggestionService
 * service.
 *
 * PHP version 5
 *
 * Copyright 2014, Google Inc. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @package    Google_Api_Ads_AdWords_v201409
 * @subpackage v201409
 * @category   WebServices
 * @copyright  2014, Google Inc. All Rights Reserved.
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache License,
 *             Version 2.0
 */
require_once "Google/Api/Ads/AdWords/Lib/AdWordsSoapClient.php";

if (!class_exists("Address", false)) {
  /**
   * Structure to specify an address location.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class Address {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "Address";

    /**
     * @access public
     * @var string
     */
    public $streetAddress;

    /**
     * @access public
     * @var string
     */
    public $streetAddress2;

    /**
     * @access public
     * @var string
     */
    public $cityName;

    /**
     * @access public
     * @var string
     */
    public $provinceCode;

    /**
     * @access public
     * @var string
     */
    public $provinceName;

    /**
     * @access public
     * @var string
     */
    public $postalCode;

    /**
     * @access public
     * @var string
     */
    public $countryCode;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($streetAddress = null, $streetAddress2 = null, $cityName = null, $provinceCode = null, $provinceName = null, $postalCode = null, $countryCode = null) {
      $this->streetAddress = $streetAddress;
      $this->streetAddress2 = $streetAddress2;
      $this->cityName = $cityName;
      $this->provinceCode = $provinceCode;
      $this->provinceName = $provinceName;
      $this->postalCode = $postalCode;
      $this->countryCode = $countryCode;
    }

  }
}

if (!class_exists("ApiError", false)) {
  /**
   * The API error base class that provides details about an error that occurred
   * while processing a service request.
   * 
   * <p>The OGNL field path is provided for parsers to identify the request data
   * element that may have caused the error.</p>
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class ApiError {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "ApiError";

    /**
     * @access public
     * @var string
     */
    public $fieldPath;

    /**
     * @access public
     * @var string
     */
    public $trigger;

    /**
     * @access public
     * @var string
     */
    public $errorString;

    /**
     * @access public
     * @var string
     */
    public $ApiErrorType;
    private $_parameterMap = array(
      "ApiError.Type" => "ApiErrorType",
    );

    /**
     * Provided for setting non-php-standard named variables
     * @param $var Variable name to set
     * @param $value Value to set
     */
    public function __set($var, $value) {
      $this->{$this->_parameterMap[$var]} = $value;
    }

    /**
     * Provided for getting non-php-standard named variables
     * @param $var Variable name to get
     * @return mixed Variable value
     */
    public function __get($var) {
      if (!isset($this->_parameterMap[$var])) {
        return null;
      }
      return $this->{$this->_parameterMap[$var]};
    }

    /**
     * Provided for getting non-php-standard named variables
     * @return array parameter map
     */
    protected function getParameterMap() {
      return $this->_parameterMap;
    }

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($fieldPath = null, $trigger = null, $errorString = null, $ApiErrorType = null) {
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
      $this->ApiErrorType = $ApiErrorType;
    }

  }
}

if (!class_exists("ApplicationException", false)) {
  /**
   * Base class for exceptions.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class ApplicationException {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "ApplicationException";

    /**
     * @access public
     * @var string
     */
    public $message;

    /**
     * @access public
     * @var string
     */
    public $ApplicationExceptionType;
    private $_parameterMap = array(
      "ApplicationException.Type" => "ApplicationExceptionType",
    );

    /**
     * Provided for setting non-php-standard named variables
     * @param $var Variable name to set
     * @param $value Value to set
     */
    public function __set($var, $value) {
      $this->{$this->_parameterMap[$var]} = $value;
    }

    /**
     * Provided for getting non-php-standard named variables
     * @param $var Variable name to get
     * @return mixed Variable value
     */
    public function __get($var) {
      if (!isset($this->_parameterMap[$var])) {
        return null;
      }
      return $this->{$this->_parameterMap[$var]};
    }

    /**
     * Provided for getting non-php-standard named variables
     * @return array parameter map
     */
    protected function getParameterMap() {
      return $this->_parameterMap;
    }

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($message = null, $ApplicationExceptionType = null) {
      $this->message = $message;
      $this->ApplicationExceptionType = $ApplicationExceptionType;
    }

  }
}

if (!class_exists("AuthenticationError", false)) {
  /**
   * Errors returned when Authentication failed.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class AuthenticationError extends ApiError {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "AuthenticationError";

    /**
     * @access public
     * @var tnsAuthenticationErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null, $ApiErrorType = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
      $this->ApiErrorType = $ApiErrorType;
    }

  }
}

if (!class_exists("AuthorizationError", false)) {
  /**
   * Errors encountered when trying to authorize a user.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class AuthorizationError extends ApiError {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "AuthorizationError";

    /**
     * @access public
     * @var tnsAuthorizationErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null, $ApiErrorType = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
      $this->ApiErrorType = $ApiErrorType;
    }

  }
}

if (!class_exists("ClientTermsError", false)) {
  /**
   * Error due to user not accepting the AdWords terms of service.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class ClientTermsError extends ApiError {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "ClientTermsError";

    /**
     * @access public
     * @var tnsClientTermsErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null, $ApiErrorType = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
      $this->ApiErrorType = $ApiErrorType;
    }

  }
}

if (!class_exists("ComparableValue", false)) {
  /**
   * Comparable types for constructing ranges with.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class ComparableValue {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "ComparableValue";

    /**
     * @access public
     * @var string
     */
    public $ComparableValueType;
    private $_parameterMap = array(
      "ComparableValue.Type" => "ComparableValueType",
    );

    /**
     * Provided for setting non-php-standard named variables
     * @param $var Variable name to set
     * @param $value Value to set
     */
    public function __set($var, $value) {
      $this->{$this->_parameterMap[$var]} = $value;
    }

    /**
     * Provided for getting non-php-standard named variables
     * @param $var Variable name to get
     * @return mixed Variable value
     */
    public function __get($var) {
      if (!isset($this->_parameterMap[$var])) {
        return null;
      }
      return $this->{$this->_parameterMap[$var]};
    }

    /**
     * Provided for getting non-php-standard named variables
     * @return array parameter map
     */
    protected function getParameterMap() {
      return $this->_parameterMap;
    }

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($ComparableValueType = null) {
      $this->ComparableValueType = $ComparableValueType;
    }

  }
}

if (!class_exists("Criterion", false)) {
  /**
   * Represents a criterion (such as a keyword, placement, or vertical).
   * <span class="constraint AdxEnabled">This is disabled for AdX when it is contained within Operators: ADD, SET.</span>
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class Criterion {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "Criterion";

    /**
     * @access public
     * @var integer
     */
    public $id;

    /**
     * @access public
     * @var tnsCriterionType
     */
    public $type;

    /**
     * @access public
     * @var string
     */
    public $CriterionType;
    private $_parameterMap = array(
      "Criterion.Type" => "CriterionType",
    );

    /**
     * Provided for setting non-php-standard named variables
     * @param $var Variable name to set
     * @param $value Value to set
     */
    public function __set($var, $value) {
      $this->{$this->_parameterMap[$var]} = $value;
    }

    /**
     * Provided for getting non-php-standard named variables
     * @param $var Variable name to get
     * @return mixed Variable value
     */
    public function __get($var) {
      if (!isset($this->_parameterMap[$var])) {
        return null;
      }
      return $this->{$this->_parameterMap[$var]};
    }

    /**
     * Provided for getting non-php-standard named variables
     * @return array parameter map
     */
    protected function getParameterMap() {
      return $this->_parameterMap;
    }

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($id = null, $type = null, $CriterionType = null) {
      $this->id = $id;
      $this->type = $type;
      $this->CriterionType = $CriterionType;
    }

  }
}

if (!class_exists("DatabaseError", false)) {
  /**
   * Errors that are thrown due to a database access problem.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class DatabaseError extends ApiError {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "DatabaseError";

    /**
     * @access public
     * @var tnsDatabaseErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null, $ApiErrorType = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
      $this->ApiErrorType = $ApiErrorType;
    }

  }
}

if (!class_exists("DistinctError", false)) {
  /**
   * Errors related to distinct ids or content.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class DistinctError extends ApiError {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "DistinctError";

    /**
     * @access public
     * @var tnsDistinctErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null, $ApiErrorType = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
      $this->ApiErrorType = $ApiErrorType;
    }

  }
}

if (!class_exists("GeoPoint", false)) {
  /**
   * Specifies a geo location with the supplied latitude/longitude.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class GeoPoint {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "GeoPoint";

    /**
     * @access public
     * @var integer
     */
    public $latitudeInMicroDegrees;

    /**
     * @access public
     * @var integer
     */
    public $longitudeInMicroDegrees;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($latitudeInMicroDegrees = null, $longitudeInMicroDegrees = null) {
      $this->latitudeInMicroDegrees = $latitudeInMicroDegrees;
      $this->longitudeInMicroDegrees = $longitudeInMicroDegrees;
    }

  }
}

if (!class_exists("IdError", false)) {
  /**
   * Errors associated with the ids.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class IdError extends ApiError {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "IdError";

    /**
     * @access public
     * @var tnsIdErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null, $ApiErrorType = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
      $this->ApiErrorType = $ApiErrorType;
    }

  }
}

if (!class_exists("InternalApiError", false)) {
  /**
   * Indicates that a server-side error has occured. {@code InternalApiError}s
   * are generally not the result of an invalid request or message sent by the
   * client.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class InternalApiError extends ApiError {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "InternalApiError";

    /**
     * @access public
     * @var tnsInternalApiErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null, $ApiErrorType = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
      $this->ApiErrorType = $ApiErrorType;
    }

  }
}

if (!class_exists("Keyword", false)) {
  /**
   * Represents a keyword.
   * <span class="constraint AdxEnabled">This is disabled for AdX when it is contained within Operators: ADD, SET.</span>
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class Keyword extends Criterion {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "Keyword";

    /**
     * @access public
     * @var string
     */
    public $text;

    /**
     * @access public
     * @var tnsKeywordMatchType
     */
    public $matchType;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($text = null, $matchType = null, $id = null, $type = null, $CriterionType = null) {
      parent::__construct();
      $this->text = $text;
      $this->matchType = $matchType;
      $this->id = $id;
      $this->type = $type;
      $this->CriterionType = $CriterionType;
    }

  }
}

if (!class_exists("Language", false)) {
  /**
   * Represents a Language criterion.
   * <p>A criterion of this type can only be created using an ID.
   * <span class="constraint AdxEnabled">This is enabled for AdX.</span>
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class Language extends Criterion {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "Language";

    /**
     * @access public
     * @var string
     */
    public $code;

    /**
     * @access public
     * @var string
     */
    public $name;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($code = null, $name = null, $id = null, $type = null, $CriterionType = null) {
      parent::__construct();
      $this->code = $code;
      $this->name = $name;
      $this->id = $id;
      $this->type = $type;
      $this->CriterionType = $CriterionType;
    }

  }
}

if (!class_exists("Location", false)) {
  /**
   * Represents Location criterion.
   * <p>A criterion of this type can only be created using an ID.
   * <span class="constraint AdxEnabled">This is enabled for AdX.</span>
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class Location extends Criterion {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "Location";

    /**
     * @access public
     * @var string
     */
    public $locationName;

    /**
     * @access public
     * @var string
     */
    public $displayType;

    /**
     * @access public
     * @var tnsLocationTargetingStatus
     */
    public $targetingStatus;

    /**
     * @access public
     * @var Location[]
     */
    public $parentLocations;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($locationName = null, $displayType = null, $targetingStatus = null, $parentLocations = null, $id = null, $type = null, $CriterionType = null) {
      parent::__construct();
      $this->locationName = $locationName;
      $this->displayType = $displayType;
      $this->targetingStatus = $targetingStatus;
      $this->parentLocations = $parentLocations;
      $this->id = $id;
      $this->type = $type;
      $this->CriterionType = $CriterionType;
    }

  }
}

if (!class_exists("MobileAppCategory", false)) {
  /**
   * Represents the mobile app category to be targeted.
   * <a href="/adwords/api/docs/appendix/mobileappcategories">View the complete list of
   * available mobile app categories</a>.
   * <span class="constraint AdxEnabled">This is enabled for AdX.</span>
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class MobileAppCategory extends Criterion {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "MobileAppCategory";

    /**
     * @access public
     * @var integer
     */
    public $mobileAppCategoryId;

    /**
     * @access public
     * @var string
     */
    public $displayName;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($mobileAppCategoryId = null, $displayName = null, $id = null, $type = null, $CriterionType = null) {
      parent::__construct();
      $this->mobileAppCategoryId = $mobileAppCategoryId;
      $this->displayName = $displayName;
      $this->id = $id;
      $this->type = $type;
      $this->CriterionType = $CriterionType;
    }

  }
}

if (!class_exists("MobileApplication", false)) {
  /**
   * Represents the mobile application to be targeted.
   * <span class="constraint AdxEnabled">This is enabled for AdX.</span>
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class MobileApplication extends Criterion {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "MobileApplication";

    /**
     * @access public
     * @var string
     */
    public $appId;

    /**
     * @access public
     * @var string
     */
    public $displayName;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($appId = null, $displayName = null, $id = null, $type = null, $CriterionType = null) {
      parent::__construct();
      $this->appId = $appId;
      $this->displayName = $displayName;
      $this->id = $id;
      $this->type = $type;
      $this->CriterionType = $CriterionType;
    }

  }
}

if (!class_exists("Money", false)) {
  /**
   * Represents a money amount.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class Money extends ComparableValue {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "Money";

    /**
     * @access public
     * @var integer
     */
    public $microAmount;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($microAmount = null, $ComparableValueType = null) {
      parent::__construct();
      $this->microAmount = $microAmount;
      $this->ComparableValueType = $ComparableValueType;
    }

  }
}

if (!class_exists("NotEmptyError", false)) {
  /**
   * Errors corresponding with violation of a NOT EMPTY check.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class NotEmptyError extends ApiError {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "NotEmptyError";

    /**
     * @access public
     * @var tnsNotEmptyErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null, $ApiErrorType = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
      $this->ApiErrorType = $ApiErrorType;
    }

  }
}

if (!class_exists("NumberValue", false)) {
  /**
   * Number value types for constructing number valued ranges.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class NumberValue extends ComparableValue {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "NumberValue";

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($ComparableValueType = null) {
      parent::__construct();
      $this->ComparableValueType = $ComparableValueType;
    }

  }
}

if (!class_exists("OperationAccessDenied", false)) {
  /**
   * Operation not permitted due to the invoked service's access policy.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class OperationAccessDenied extends ApiError {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "OperationAccessDenied";

    /**
     * @access public
     * @var tnsOperationAccessDeniedReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null, $ApiErrorType = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
      $this->ApiErrorType = $ApiErrorType;
    }

  }
}

if (!class_exists("Placement", false)) {
  /**
   * A placement used for modifying bids for sites when targeting the content
   * network.
   * <span class="constraint AdxEnabled">This is enabled for AdX.</span>
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class Placement extends Criterion {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "Placement";

    /**
     * @access public
     * @var string
     */
    public $url;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($url = null, $id = null, $type = null, $CriterionType = null) {
      parent::__construct();
      $this->url = $url;
      $this->id = $id;
      $this->type = $type;
      $this->CriterionType = $CriterionType;
    }

  }
}

if (!class_exists("Product", false)) {
  /**
   * Product targeting criteria, represents a filter for products in the
   * product feed that is defined by the advertiser. The criteria is used to
   * determine the products in a Merchant Center account to be used with the
   * ProductAds in the AdGroup. This criteria is available only to some advertisers.
   * <span class="constraint AdxEnabled">This is disabled for AdX when it is contained within Operators: ADD, SET.</span>
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class Product extends Criterion {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "Product";

    /**
     * @access public
     * @var ProductCondition[]
     */
    public $conditions;

    /**
     * @access public
     * @var string
     */
    public $text;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($conditions = null, $text = null, $id = null, $type = null, $CriterionType = null) {
      parent::__construct();
      $this->conditions = $conditions;
      $this->text = $text;
      $this->id = $id;
      $this->type = $type;
      $this->CriterionType = $CriterionType;
    }

  }
}

if (!class_exists("ProductCondition", false)) {
  /**
   * Conditions to filter the products defined in product feed for targeting.
   * The condition is defined as operand=argument.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class ProductCondition {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "ProductCondition";

    /**
     * @access public
     * @var string
     */
    public $argument;

    /**
     * @access public
     * @var ProductConditionOperand
     */
    public $operand;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($argument = null, $operand = null) {
      $this->argument = $argument;
      $this->operand = $operand;
    }

  }
}

if (!class_exists("ProductConditionOperand", false)) {
  /**
   * Attribute for the product condition.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class ProductConditionOperand {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "ProductConditionOperand";

    /**
     * @access public
     * @var string
     */
    public $operand;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($operand = null) {
      $this->operand = $operand;
    }

  }
}

if (!class_exists("Proximity", false)) {
  /**
   * Represents a Proximity Criterion.
   * 
   * A proximity is an area within a certain radius of a point with the center point being described
   * by a lat/long pair. The caller may also alternatively provide address fields which will be
   * geocoded into a lat/long pair. Note: If a geoPoint value is provided, the address is not
   * used for calculating the lat/long to target.
   * <p>
   * <span class="constraint AdxEnabled">This is enabled for AdX.</span>
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class Proximity extends Criterion {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "Proximity";

    /**
     * @access public
     * @var GeoPoint
     */
    public $geoPoint;

    /**
     * @access public
     * @var tnsProximityDistanceUnits
     */
    public $radiusDistanceUnits;

    /**
     * @access public
     * @var double
     */
    public $radiusInUnits;

    /**
     * @access public
     * @var Address
     */
    public $address;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($geoPoint = null, $radiusDistanceUnits = null, $radiusInUnits = null, $address = null, $id = null, $type = null, $CriterionType = null) {
      parent::__construct();
      $this->geoPoint = $geoPoint;
      $this->radiusDistanceUnits = $radiusDistanceUnits;
      $this->radiusInUnits = $radiusInUnits;
      $this->address = $address;
      $this->id = $id;
      $this->type = $type;
      $this->CriterionType = $CriterionType;
    }

  }
}

if (!class_exists("QuotaCheckError", false)) {
  /**
   * Encapsulates the errors thrown during developer quota checks.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class QuotaCheckError extends ApiError {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "QuotaCheckError";

    /**
     * @access public
     * @var tnsQuotaCheckErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null, $ApiErrorType = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
      $this->ApiErrorType = $ApiErrorType;
    }

  }
}

if (!class_exists("RangeError", false)) {
  /**
   * A list of all errors associated with the Range constraint.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class RangeError extends ApiError {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "RangeError";

    /**
     * @access public
     * @var tnsRangeErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null, $ApiErrorType = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
      $this->ApiErrorType = $ApiErrorType;
    }

  }
}

if (!class_exists("RateExceededError", false)) {
  /**
   * Signals that a call failed because a measured rate exceeded.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class RateExceededError extends ApiError {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "RateExceededError";

    /**
     * @access public
     * @var tnsRateExceededErrorReason
     */
    public $reason;

    /**
     * @access public
     * @var string
     */
    public $rateName;

    /**
     * @access public
     * @var string
     */
    public $rateScope;

    /**
     * @access public
     * @var integer
     */
    public $retryAfterSeconds;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $rateName = null, $rateScope = null, $retryAfterSeconds = null, $fieldPath = null, $trigger = null, $errorString = null, $ApiErrorType = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->rateName = $rateName;
      $this->rateScope = $rateScope;
      $this->retryAfterSeconds = $retryAfterSeconds;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
      $this->ApiErrorType = $ApiErrorType;
    }

  }
}

if (!class_exists("ReadOnlyError", false)) {
  /**
   * Errors from attempting to write to read-only fields.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class ReadOnlyError extends ApiError {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "ReadOnlyError";

    /**
     * @access public
     * @var tnsReadOnlyErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null, $ApiErrorType = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
      $this->ApiErrorType = $ApiErrorType;
    }

  }
}

if (!class_exists("RejectedError", false)) {
  /**
   * Indicates that a field was rejected due to compatibility issues.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class RejectedError extends ApiError {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "RejectedError";

    /**
     * @access public
     * @var tnsRejectedErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null, $ApiErrorType = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
      $this->ApiErrorType = $ApiErrorType;
    }

  }
}

if (!class_exists("RequestError", false)) {
  /**
   * Encapsulates the generic errors thrown when there's an error with user
   * request.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class RequestError extends ApiError {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "RequestError";

    /**
     * @access public
     * @var tnsRequestErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null, $ApiErrorType = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
      $this->ApiErrorType = $ApiErrorType;
    }

  }
}

if (!class_exists("RequiredError", false)) {
  /**
   * Errors due to missing required field.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class RequiredError extends ApiError {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/adwords/cm/v201409";
    const XSI_TYPE = "RequiredError";

    /**
     * @access public
     * @var tnsRequiredErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null, $ApiErrorType = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
      $this->ApiErrorType = $ApiErrorType;
    }

  }
}

if (!class_exists("SizeLimitError", false)) {
  /**
   * Indicates that the number of entries in the request or response exceeds the system limit.
   * 
   * 
   * 
   * Structure to specify an address location.
   * @package Google_Api_Ads_AdWords_v201409
   * @subpackage v201409
   */
  class SizeLimitError extends ApiError {

    const WSDL_NAMESPACE = "https://adwords.google.com/api/a