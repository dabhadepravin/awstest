<?php
/* load GA files */
$path = getcwd();
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once 'Google/Api/Ads/Dfp/Lib/DfpUser.php';
require_once 'Google/Api/Ads/Dfp/Util/StatementBuilder.php';
require_once 'vendor/Common/ExampleUtils.php';
require_once 'Google/Api/Ads/Common/Util/MediaUtils.php';

class Gahelper {

	public $user = null;
	public $StatementBuilder= null;
	public $serviceObject  = null;
	public $service_name;
	private $salespersonId = null;
	private $traffickerId = null;
	private $default_advertiser = null;
	private $pub_eail = null;
	function __construct(){
		//parent::__construct();
		$this->user = new DfpUser();
	//	$this->load->model('administrator_model','',true);
		$this->StatementBuilder = new StatementBuilder();
		$this->CI =& get_instance();
		$this->CI->load->model('administrator_model');
		//$this-> = $this->CI->administrator_model->get_setting("pub_id");
		//$this->CI->administrator_model->get_setting("pub_email");
		$this->traffickerId = $this->CI->administrator_model->get_setting("trafficker_id");
		$this->salespersonId = $this->CI->administrator_model->get_setting("salesperson_id");
		$this->default_advertiser = $this->CI->administrator_model->get_setting("default_advtid");
	
		
	}
	public function checkAdvertiserExists($advertiser_name){
		$this->StatementBuilder->where('name = :name AND type = :type')
			->OrderBy('id ASC')
			->Limit(1)
			->WithBindVariableValue('type','ADVERTISER')
			->WithBindVariableValue('name',$advertiser_name);
		 
		$totalResultSetSize	  = 0;
    // Get companies by statement.
    	$page = $this->serviceObject->getCompaniesByStatement($this->StatementBuilder->ToStatement());
		if (isset($page->results)) {
     	 	$totalResultSetSize = $page->totalResultSetSize;
      	}
      	if($totalResultSetSize > 0)
      		return true;
     	else
      		return false;


		
	}
	
	public function createAdvertiser($advertiser_data){
		
		//$this->_advertiser->updateorder($orderids,$advt_id);
		$company = new stdClass();
 		$company->name = $advertiser_data["companyname"];
 		$company->type = 'ADVERTISER';
 		$company->primaryPhone = $advertiser_data["phone"];
 		$company->faxPhone = $advertiser_data["fax"] ;
 		$company->email = $advertiser_data["email"];
 		$company->address = $advertiser_data["address"];
 		$company->externalId = $advertiser_data["adveriser_internal_id"];

		$companies = $this->serviceObject->createCompanies($company);
		if(count($companies)>0){
			foreach($companies as $company){
		   		$dfp_id = $company->id;
		   		return $dfp_id;
		 	} 
	 	}
	}

	public function createOrder($order_data){

		$advertiserId = $this->default_advertiser;
  		$salespersonId = $this->salespersonId;
  		$traffickerId = $this->traffickerId;
  		$totalBudget = $order_data['totalBudget'];
  		$ordernotes = $order_data['notes'];
  		$order_internal_id = $order_data['internal_id'];
  		$order = new stdClass();
  		
  		$order->name = "order_".time();
 	    $order->advertiserId = $advertiserId;
   		$order->salespersonId = $salespersonId;
    	$order->traffickerId = $traffickerId;
    	
	    //$order->startDateTime = $startDateTime;
	    //$order->endDateTime = $endDateTime;
	    //$order->unlimitedEndDateTime = $unlimitedEndDateTime;
	    //$order->status = $status;
	  
	    $order->notes = $ordernotes;
	    $order->externalOrderId = $order_internal_id;
	    $order->totalBudget = $totalBudget;
	    $orders = $this->serviceObject->createOrders($order);
	    if(isset($orders) && count($orders)>0){
	    	foreach($orders as $order){

	    		return $order->id;
	    	}

	    }	
	}

	public function createLineItem($lineItemsData,$orderid){

		$line_item_creatives = array();
		foreach ($lineItemsData as $lineitemdata) {
			$orderid = $orderid;
			$targetPlacementIds = array(2113495,2104135);
			$inventoryTargeting = new InventoryTargeting();
			$inventoryTargeting->targetedPlacementIds = $targetPlacementIds;

			$geoTargeting = new GeoTargeting();
		    $postalCodeLocation = new DfpLocation();
  			$postalCodeLocation->id = 9000093;
  			$countryLocation = new DfpLocation();
  			$countryLocation->id = 2840;
  			 $regionLocation = new DfpLocation();
  			 $regionLocation->id = 20123;
			//$geoTargeting->targetedLocations = array($countryLocation, $regionLocation);

			$targeting = new Targeting();
 			$targeting->inventoryTargeting = $inventoryTargeting;
			$targeting->geoTargeting = $geoTargeting;
  			$lineItem = new LineItem();
  			$lineItem->name =  'Line item #' . uniqid();
  			$lineItem->externalId = $lineitemdata->liid;
  			$lineItem->orderId = $orderid;
  			$lineItem->targeting = $targeting;
  			$lineItem->lineItemType = 'STANDARD';
  			$lineItem->allowOverbook = 'TRUE';
  			$lineItem->startDateTimeType = 'IMMEDIATELY';
    		$lineItem->endDateTime =DateTimeUtils::GetDfpDateTime(new DateTime('+1 month'));
  			$creativePlaceholder = new CreativePlaceholder();
    		$creativePlaceholder->size = new Size($lineitemdata->li_creativewidth, $lineitemdata->li_creativeheight, false);
    		$creativePlaceholder->id = 55492297016;
    		$lineItem->creativePlaceholders = array($creativePlaceholder);
    		$lineItem->costType = 'CPM';
    		$lineItem->costPerUnit = new Money('AED', floatval($lineitemdata->li_adtcost));
    		$goal = new Goal();
		    $goal->units = ($lineitemdata->li_qty);
		    $goal->unitType = 'IMPRESSIONS';
		    $goal->goalType = 'UNKNOWN';
		   	$lineItem->primaryGoal = $goal;
		    $lineItems[] = $lineItem;
		    $line_creative = array();
		    $line_creative['filename'] = $lineitemdata->li_creativefilename;
		    $line_creative['width'] = $lineitemdata->li_creativewidth;
		    $line_creative['height'] = $lineitemdata->li_creativeheight;
		    $line_creative['alttext'] = $lineitemdata->li_creativealttext;
		    $line_creative['url'] = $lineitemdata->licreativeurl;

		    $line_item_creatives[$lineitemdata->liid] =  $line_creative;
		    // add creatives

		}
		//print_r($line_item_creatives);
		$lineitems_ret = array();
		$lineItems = $this->serviceObject->createLineItems($lineItems);
		 if (isset($lineItems)) {
		 	$i = 0;
  			  foreach ($lineItems as $lineItem) {
  			  	$lineitems_ret[$i]["id"] = $lineItem->id;
  			  	$lineitems_ret[$i]["orderid"] = $lineItem->orderId;
  			  	$lineitems_ret[$i]["name"] = $lineItem->name;
  			  	$lineitems_ret[$i]["internalid"] = $lineItem->externalId;
  			  	$line_item_creatives[$lineItem->externalId]['lineitem_id'] = $lineItem->id;
  			  	$this->createCreative($line_item_creatives[$lineItem->externalId]);
  			  	$this->updateLineItemStatus($lineItem->id);
     		 	$i++;
    	}
  		} else {
    		return false;
  		}
  		return $lineitems_ret;

	}


	public function createCreative($creativeData){
		$imageCreatives = array();
		$this->createServiceObject("CreativeService");
		$advertiserId = 330303295;
		//foreach($creativesData as $creativeData){
		$size = new Size($creativeData['width'], $creativeData['height']);
		$temp_path = pathinfo($creativeData['filename']);
	    $file_name = $temp_path['basename'];
	    // Create an image creative.
	    $imageCreative = new ImageCreative();
	    $imageCreative->name =  $file_name;
	    $imageCreative->advertiserId = $advertiserId;
	    $imageCreative->destinationUrl = $creativeData['url'];
	    $imageCreative->size = $size;
	    $line_itemid = $creativeData['lineitem_id'];

	    // Create image asset.
	    

	    $creativeAsset = new CreativeAsset();
	    $creativeAsset->fileName = $file_name;
	    $creativeAsset->assetByteArray =
	    MediaUtils::GetBase64Data($creativeData['filename']);
	    $creativeAsset->size = $size;
	    $imageCreative->primaryImageAsset = $creativeAsset;
	    $imageCreatives[] = $imageCreative;
  		$imageCreativesret = $this->serviceObject->createCreatives($imageCreatives);
  		$creativeAsset = $imageCreative = null;
  		$this->createServiceObject("");
  		
  		if($imageCreativesret){
  			$creative_id = $imageCreativesret[0]->id;
  			$this->associateCreativeLineItem($line_itemid,$creative_id );	
  		}
			//$this->associateCreativeLineItem();
		 return $imageCreativesret;
	}

	public function associateCreativeLineItem($line_itemid,$creative_id){

		$this->createServiceObject("LineItemCreativeAssociationService");
		$licas = array();
		$lineItem_id = $line_itemid;
		$creative_id = $creative_id;
		$lica = new LineItemCreativeAssociation();
  		$lica->creativeId = $creative_id;
  		$lica->lineItemId = $lineItem_id;
  		$licas = array($lica);
		$this->serviceObject->createLineItemCreativeAssociations($licas);
		$lica = null;

		$this->createServiceObject("");

	}

	public function createServiceObject($servicename=''){
		if(!empty($servicename)){
			$this->serviceObject = $this->user->GetService($servicename,'v201411');	
		} else {
			$this->serviceObject = null;
		}

	}

	public function getAdunitsDFP(){
		$this->StatementBuilder->OrderBy('id ASC')
			->Limit(StatementBuilder::SUGGESTED_PAGE_LIMIT);
			
		 
		$totalResultSetSize	  = 0;
		  do {
  	  		// Get suggested ad units by statement.
  			  $page = $this->serviceObject->getAdUnitsByStatement($this->StatementBuilder->ToStatement());
		    // Display results.
			    if (isset($page->results)) {
			      $totalResultSetSize = $page->totalResultSetSize;
			      $i = $page->startIndex;
			      $adunits  = array();
			      foreach ($page->results as $suggestedAdUnit) {
			      	
			      	$adunits[]  = $suggestedAdUnit;
			      	
			        
			      }
			    }

    			$this->StatementBuilder->IncreaseOffsetBy(StatementBuilder::SUGGESTED_PAGE_LIMIT);
  			} while ($this->StatementBuilder->GetOffset() < $totalResultSetSize);
    // Get companies by statement.
  			return $adunits;
    			
	}

	public function approveOrders($orderid){
		$this->createServiceObject("OrderService");
	    $this->StatementBuilder->Where('id = :id')
	      ->OrderBy('id ASC')
	      ->Limit(1)
	      ->WithBindVariableValue('id', $orderid);

	  // Default for total result set size.
	  $totalResultSetSize = 0;

	  do {
	    // Get orders by statement.
	    $page = $this->serviceObject->getOrdersByStatement($this->StatementBuilder->ToStatement());
		if (isset($page->results)) {
	      $totalResultSetSize = $page->totalResultSetSize;
	  	}
	   } while ($this->StatementBuilder->GetOffset() < $totalResultSetSize);   
	   if($totalResultSetSize > 0){
		$this->StatementBuilder->RemoveLimitAndOffset();
		$action = new ApproveOrders();
	   	$result = $this->serviceObject->performOrderAction($action,
      	$this->StatementBuilder->ToStatement());

    // Display results.
		if (isset($result) && $result->numChanges > 0) {
			$this->createServiceObject("");
		 		return true;
		} else {
		      return false;
		  }
 		} else { return false;}
	      
	 }

	 public function updateLineItemStatus($lineitem_id){
	 	$this->createServiceObject("LineItemService");
		$this->StatementBuilder->Where('id = :id')
	      ->OrderBy('id ASC')
	      ->Limit(1)
	      ->WithBindVariableValue('id', $lineitem_id);

	  // Get the line item.
	  $page = $this->serviceObject->getLineItemsByStatement(
	  $this->StatementBuilder->ToStatement());
	  /*if (isset($page->results)) {
    	$lineItems = $page->results;
    	foreach ($lineItems as $lineItem) {
    	  $lineItem->status = 'READY';
    	  $lineItem->deliveryRateType = 'AS_FAST_AS_POSSIBLE';
   		 }
     }	
      $lineItems = $this->serviceObject->updateLineItems($lineItems);
      */

	  $action = new ActivateLineItems();
	   	$result = $this->serviceObject->performLineItemAction($action,
      	$this->StatementBuilder->ToStatement());
	  
	 /* $lineItem = $page->results[0];
      $lineItem->status = 'READY';
	   // Update the line item on the server.
	  $lineItems = $this->serviceObject->updateLineItems(array($lineItem));
	  print_r($lineItems);*/
	  $this->createServiceObject("");

	}

	public function syncOrder($orderid){
		
		$this->createServiceObject("OrderService");
	    $this->StatementBuilder->Where('id = :id')
	      ->OrderBy('id ASC')
	      ->Limit(1)
	      ->WithBindVariableValue('id', $orderid);
	    $page = $this->serviceObject->getOrdersByStatement(
        $this->StatementBuilder->ToStatement());
 		if (isset($page->results)) {
	    foreach ($page->results as $order) {
        	return $order;
      	}  
      }
	}
}	