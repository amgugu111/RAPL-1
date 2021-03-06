<?php
//include Configurations
include './config/db.php';

//declare requred parameters & methods
$_PARAMS = array(
  'name' => ['slNo', 'gatePassNo','vehicleNo',
            'purchaseHub','purchaseType','grossWt',
            'tareWt','wastage','netWt','imgUrl'],
  'type' => ['alphanumeric', 'alphanumeric','alphanumeric',
             'alphanumeric', 'alphanumeric','alphanumeric', 'alphanumeric',
              'alphanumeric','alphanumeric', 'alphanumeric'],
  'maxLength' => ['8', '13', '255','255','255','255','255','255','255','255'],
);
$_METHOD = 'GET';


// Call API, init API calls execute_main()
echo json_encode(init_api($_METHOD,$_DATA,$_PARAMS,$_ERROR=''),JSON_UNESCAPED_SLASHES);


// API Main
/*-----------main()---------*/
function execute_main()
{
  global $_DATA, $con;
  $slNo = $_DATA['slNo'];
  $gatePassNo = $_DATA['gatePassNo'];
  $vehicleNo = $_DATA['vehicleNo'];
  $purchaseHub = $_DATA['purchaseHub'];
  $purchaseType = $_DATA['purchaseType'];
  $grossWt = $_DATA['grossWt'];
  $tareWt = $_DATA['tareWt'];
  $wastage = $_DATA['wastage'];
  $netWt = $_DATA['netWt'];
  $imgUrl = $_DATA['imgUrl'];

    if($con->query("INSERT into weighbridge(slno,gatepassno,vehicleno,purchasehub,purchasetype,grosswt,tarewt,wastage,netwt,imgUrl,date,time)
                    values('".$slNo."','".$gatePassNo."','".$vehicleNo."','".$purchaseHub."',
                            '".$purchaseType."','".$grossWt."','".$tareWt."','".$wastage."','".$netWt."','".$imgUrl."','".date('Y-m-d')."','".date('H:i:s')."')")){
        $returnArr = returnData('Save successfully', 200);

    } else{

        $returnArr = returnData('Something went wrong', 401);
    }

  return $returnArr;
}
