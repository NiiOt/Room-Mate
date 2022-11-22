<?php
// session_start();
// $ndate = date("Y");
// $_SESSION["cyear"] = '2019';
include "php/config.php";


	function getArrears($userid){
		
		include "php/config.php";
		$ndate = date("Y");
     $sql = mysqli_query($con,"SELECT SUM(`total`) AS `arrears` FROM `tblinvoices` WHERE `clientid`='$userid' AND `date` NOT LIKE '2019%'");
	
		// $sql = mysqli_query($con,"SELECT `total`,`id` FROM `tblinvoices` WHERE `clientid`='$userid' AND `date` NOT LIKE '2019%'");
		if(mysqli_num_rows($sql)>0){
			$x=0;
			// $invoiceArr = array();
			while ($row= mysqli_fetch_assoc($sql)) {
				# code...
				// if($x<=15000){
				// $invid = $row["id"];
				$total = $row["arrears"];

				// $joint = $invid.",".$total;
				// array_push($invoiceArr, $joint)
				return $total;
			}
		}
	}


	function getArrearsID($userid){
		$ndate = date("Y");
		include "php/config.php";
     	$sql = mysqli_query($con,"SELECT `id` FROM `tblinvoices` WHERE `clientid`='$userid' AND `date` NOT LIKE '2019%'");
	
		// $sql = mysqli_query($con,"SELECT `total`,`id` FROM `tblinvoices` WHERE `clientid`='$userid' AND `date` NOT LIKE '2019%'");
		if(mysqli_num_rows($sql)>0){
			$x=0;
			$invoiceArr = array();
			while ($row= mysqli_fetch_assoc($sql)) {
				# code...
				// if($x<=15000){
				$invid = $row["id"];
				// $total = $row["arrears"];

				// $joint = $invid.",".$total;
				array_push($invoiceArr, $invid);
				return $invoiceArr;
			}
		}
	}




  function getPaid($arrears){
		$ndate = date("Y");
		include "php/config.php";

		$paid=0;
	for($i=0; $i<=sizeof($arrears); $i++){
		$invid= $arrears[$i];

		$sql = mysqli_query($con,"SELECT SUM(`amount`) AS `paid` FROM `tblinvoicepaymentrecords` WHERE `invoiceid`='$invid'");
		if(mysqli_num_rows($sql)>0){
			// $x=0;
				while ($row= mysqli_fetch_assoc($sql)) {
				# code...
				// if($x<=15000){
				$paidn = $row["paid"];

				$paid = $paid+$paidn;

			}
		}
				return $paid;


	}	
}


function breakTag($invid){

	$invid = $invid;
	// return $invid;
	$lol="";
	include "php/config.php";

	$sql = mysqli_query($con,"SELECT `tbltags`.`name` AS `tagName` FROM `tbltags` INNER JOIN `tbltaggables` ON `tbltags`.`id` = `tbltaggables`.`tag_id` WHERE `tbltaggables`.`rel_id`='$invid'");

	if(mysqli_num_rows($sql)>0){
		while($row=mysqli_fetch_assoc($sql)){
		$name = $row["tagName"];
				$lol = $lol."<button class='btn btn-primary tag' title='$name' style='border:1px solid white'>".$name."</button>";
		}
		return $lol;
	}else{
		// echo "No enumerator";

		return $lol;
	}




	// function loadYear($year){
	// 	$year = $_GET["year"];
	// 	// $year = $year;
	// 	include "php/config.php";

	// 	$sql = "SELECT `tblinvoices`.`id` AS `invid`,`tblinvoices`.`date` AS `date`,`tblinvoices`.`number` AS `number`,`tblinvoices`.`prefix` AS `prefix`,`tblinvoices`.`subtotal` AS `subtotal`, `tblinvoices`.`adjustment` AS `adjustment`,`tblinvoices`.`discount_total` AS `discount_total`,`tblinvoicepaymentrecords`.`amount` AS `amountPaid`,`tblclients`.`company` AS `company`,`tblclients`.`phonenumber` AS `phonenumber`,`tblinvoicepaymentrecords`.`note` AS `note`,`tbltags`.`name` AS `tagName`,`tblcustomers_groups`.`name` AS `bGroup`,`tblstaff`.`firstname`,`tblstaff`.`lastname`,`tblcustomfieldsvalues`.`value` AS `location` FROM `tblinvoices` LEFT JOIN `tblinvoicepaymentrecords` ON `tblinvoices`.`id` = `tblinvoicepaymentrecords`.`invoiceid` LEFT JOIN `tblclients` ON `tblclients`.`userid` = `tblinvoices`.`clientid` LEFT JOIN `tbltaggables` ON `tbltaggables`.`rel_id`=`tblinvoices`.`id` LEFT JOIN `tbltags` ON `tbltags`.`id`=`tbltaggables`.`tag_id` LEFT JOIN `tblcustomer_groups` ON `tblinvoices`.`clientid` = `tblcustomer_groups`.`customer_id` LEFT JOIN `tblcustomers_groups` ON `tblcustomer_groups`.`groupid` = `tblcustomers_groups`.`id` LEFT JOIN `tblstaff` ON `tblinvoices`.`sale_agent` = `tblstaff`.`staffid` LEFT JOIN `tblcustomfieldsvalues` ON `tblcustomfieldsvalues`.`relid`=`tblclients`.`userid` WHERE `tblcustomfieldsvalues`.`fieldid`='1' AND `tblinvoices`.`date` LIKE '$year%'  GROUP BY `tblinvoices`.`id` ORDER BY `tblinvoices`.`id` DESC";

	// 	return $sql;

	// }





	

	// $tags = explode(",", $tag);


	// $tagL = sizeof($tags);
	// $lol="";
	// for($i=0; $i<= $tagL-1; $i++){
	// 	$lol = $lol."<button class='btn btn-primary tag' title='$tags[$i]' style='border:1px solid white'>".$tags[$i]."</button>";
	// }
	// if($lol==""){

	// }else{
	// 	return $lol;
	// }
	

}


function getVAN($invid){
		$invid = $invid;
	// return $invid;
	// $lol="";
	include "php/config.php";

	$sql = mysqli_query($con,"SELECT `value` FROM `tblcustomfieldsvalues` WHERE `relid`='$invid' AND `fieldid`='8'");
	if(mysqli_num_rows($sql)>0){
		$x=0;
		while ($row= mysqli_fetch_assoc($sql)) {
			# code...
			// if($x<=15000){
			$invid = $row["value"];

			return $invid;
		}
}
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>MIS</title>

		<meta name="description" content="Static &amp; Dynamic Tables" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" type="text/css" href="assets/responsive.bootstrap.min.css">

	

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		
	</head>

	<body class="no-skin">
		

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			

			<div class="main-content">
				<div class="main-content-inner">
					

					<div class="page-content">
						


					

								<div class="row">
									<div class="col-xs-12">
										<h3 class="header smaller lighter blue">Zebrams</h3>

										<div class="clearfix">
											<div class="pull-left">
												Results Showing For:
												<span class="label label-lg label-pink arrowed-right">Year: </span>
												 <input type="text" value="All" class="year" readonly="true">
												<span class="label label-lg label-yellow arrowed-right">Payment: </span>
												<!-- Year: <span></span> -->
												  <input type="text" value="All" class="payment" readonly="true">
												<span class="label label-lg label-pink arrowed-right">Loc: </span>
												 <input type="text" value="All" class="loc" readonly="true">
												 <span class="label label-lg label-yellow arrowed-right">Rev. Collector: </span>
												 <input type="text" value="All" class="revC" readonly="true">
											</div>
											<div class="pull-right tableTools-container"></div>
										
											<div class="btn-group pull-right">
												<button data-toggle="dropdown" class="btn dropdown-toggle">
													Filter
													<span class="ace-icon fa fa-filter icon-on-right"></span>
												</button>

												<ul class="dropdown-menu dropdown-default" id="filter">
													<li>
														<a href="#" id="All_1">All</a>
													</li>
													<li>
														<a href="#" id="2019_1">2019</a>
													</li>
													<li>
														<a href="index.php" id="2018_1">2018</a>
													</li>
													<li class="divider"></li>

													<li>
														<a href="#" id="All_14">All</a>
													</li>
													<li>
														<a href="#" id="Full Payment_14">Full Payment</a>
													</li>
													<li>
														<a href="#" id="Part Payment_14">Partial Payment</a>
													</li>
													<li>
														<a href="#" id="No Payment Made_14">No Payment</a>
													</li>
													<li class="divider"></li>
													<li class="dropdown-hover">
														<a href="#" tabindex="-1" class="clearfix">
															<span class="pull-left">Location</span>

															<i class="ace-icon fa fa-caret-right pull-right"></i>
														</a>

														<ul class="dropdown-menu dropdown-primary">
															<li>
																<a href="#" id="All_7" tabindex="-1">All</a>
															</li>
															<?php 
															$sql = mysqli_query($con,"SELECT DISTINCT `value` FROM `tblcustomfieldsvalues` WHERE `fieldto`='customers' AND `fieldid`='1' GROUP BY `value`");
															if(mysqli_num_rows($sql)){
																while($row=mysqli_fetch_assoc($sql)){
																	$name = $row["value"];
																	echo "<li><a href='#' tabindex='-1' id=".$name.'_7'.">".$name."</a></li>";
																}
															}else{
																echo "No enumerator";
															}

														?>
														
														</ul>
												</li>

														<!-- <li><select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Filter by Sale Agent...">
																<option value="">  </option>
															</select></li> -->
													
													<li>
														<li class="dropdown-hover">
													<a href="#" tabindex="-1" class="clearfix">
														<span class="pull-left">Revenue Collector</span>

														<i class="ace-icon fa fa-caret-right pull-right"></i>
													</a>

													<ul class="dropdown-menu dropdown-danger">
														<li>
															<a href="#" id="All_15" tabindex="-1">All Collectors</a>
														</li>
														<?php 
															$sql = mysqli_query($con,"SELECT `tblinvoices`.`sale_agent`,`firstname`,`lastname` FROM `tblinvoices` LEFT JOIN `tblstaff` ON `tblstaff`.`staffid`=`tblinvoices`.`sale_agent` GROUP BY `tblstaff`.`staffid`");
															if(mysqli_num_rows($sql)){
																while($row=mysqli_fetch_assoc($sql)){
																	$name = $row["firstname"];
																	echo "<li><a href='#' tabindex='-1' id=".$name.'_15'.">".$name."</a></li>";
																}
															}else{
																echo "No enumerator";
															}

														?>

														
													</ul>
												</li>

													</li>

													<li class="divider"></li>

													<li>
														<a href="#">Separated link</a>
													</li>
												</ul>
												<input type="hidden" id="hidden"  name="">
											</div><!-- /.btn-group -->

										</div>
										<div class="table-header">
											Client Side Data

											
										</div>
										<!-- <input type="number" id="min" name=""> -->
											<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															#
														</th>
														<th>Date</th>
														<th>Client ID</th>
														<th>Bill #</th>
														<th >Bill Type</th>
														<th>
															Rate Payer
														</th>
														<th>Valuation No.</th>
														<th>Phone</th>
														<th>Location</th>
														<th>Sub-Total Amount(GH¢)</th>
														<th>Discount(GH¢)</th>
														<th>Arrears</th>
														<!-- <th>Amount (less Discount)(GH¢)</th> -->
														<th>Total Amount Payable(GH¢)</th>
														<th>Total Amount Paid(GH¢)</th>
														<th>Outstanding Amount</th>
														<th>Status</th>

														<th>Sales Agent</th>
													</tr>
												</thead>

												<tbody>
													<?php
													$ndate = date("Y");
														// $sql = mysqli_query($con,"SELECT `tblinvoices`.`id` AS `invid`,`tblinvoices`.`date`,`tblinvoices`.`number`,`tblinvoices`.`prefix`,`tblinvoices`.`subtotal`,`tblinvoices`.`adjustment`,`tblinvoices`.`discount_total`,`tblinvoicepaymentrecords`.`amount` AS `amountPaid`,`tblclients`.`company`,`tblclients`.`phonenumber`,`tblinvoicepaymentrecords`.`note`,`tbltags`.`name` AS `tagName`,`tblcustomersgroups`.`name` AS `bGroup`,`tblstaff`.`firstname`,`tblstaff`.`lastname`,`tblcustomfieldsvalues`.`value` AS `location` FROM `tblinvoices` LEFT JOIN `tblinvoicepaymentrecords` ON `tblinvoices`.`id` = `tblinvoicepaymentrecords`.`invoiceid` LEFT JOIN `tblclients` ON `tblclients`.`userid` = `tblinvoices`.`clientid` LEFT JOIN `tbltaggables` ON `tbltaggables`.`rel_id`=`tblinvoices`.`id` LEFT JOIN `tbltags` ON `tbltags`.`id`=`tbltaggables`.`tag_id` LEFT JOIN `tblcustomergroups_in` ON `tblinvoices`.`clientid` = `tblcustomergroups_in`.`customer_id` LEFT JOIN `tblcustomersgroups` ON `tblcustomergroups_in`.`groupid` = `tblcustomersgroups`.`id` LEFT JOIN `tblstaff` ON `tblinvoices`.`sale_agent` = `tblstaff`.`staffid` LEFT JOIN `tblcustomfieldsvalues` ON `tblcustomfieldsvalues`.`relid`=`tblclients`.`userid` WHERE `tblcustomfieldsvalues`.`fieldid`='1' AND `tblinvoices`.`date` LIKE '2019%'  GROUP BY `tblinvoices`.`id` ORDER BY `tblinvoices`.`id` DESC");

													$sql = mysqli_query($con,"SELECT `tblclients`.`userid`,`tblinvoices`.`id` AS `invid`,`tblinvoices`.`date` AS `date`,`tblinvoices`.`number` AS `number`,`tblinvoices`.`prefix` AS `prefix`,`tblinvoices`.`subtotal` AS `subtotal`, `tblinvoices`.`adjustment` AS `adjustment`,`tblinvoices`.`discount_total` AS `discount_total`,`tblinvoicepaymentrecords`.`amount` AS `amountPaid`,`tblclients`.`company` AS `company`,`tblclients`.`phonenumber` AS `phonenumber`,`tblinvoicepaymentrecords`.`note` AS `note`,`tbltags`.`name` AS `tagName`,`tblcustomers_groups`.`name` AS `bGroup`,`tblstaff`.`firstname`,`tblstaff`.`lastname`,`tblcustomfieldsvalues`.`value` AS `location` FROM `tblinvoices` LEFT JOIN `tblinvoicepaymentrecords` ON `tblinvoices`.`id` = `tblinvoicepaymentrecords`.`invoiceid` LEFT JOIN `tblclients` ON `tblclients`.`userid` = `tblinvoices`.`clientid` LEFT JOIN `tbltaggables` ON `tbltaggables`.`rel_id`=`tblinvoices`.`id` LEFT JOIN `tbltags` ON `tbltags`.`id`=`tbltaggables`.`tag_id` LEFT JOIN `tblcustomer_groups` ON `tblinvoices`.`clientid` = `tblcustomer_groups`.`customer_id` LEFT JOIN `tblcustomers_groups` ON `tblcustomer_groups`.`groupid` = `tblcustomers_groups`.`id` LEFT JOIN `tblstaff` ON `tblinvoices`.`sale_agent` = `tblstaff`.`staffid` LEFT JOIN `tblcustomfieldsvalues` ON `tblcustomfieldsvalues`.`relid`=`tblclients`.`userid` WHERE `tblcustomfieldsvalues`.`fieldid`='1' AND `tblinvoices`.`date` LIKE '2019%' GROUP BY `tblinvoices`.`id` ORDER BY `tblinvoices`.`id` DESC");
														if(mysqli_num_rows($sql)>0){
															$x=0;
															while ($row= mysqli_fetch_assoc($sql)) {
																# code...
																 if($x<=1000){

																$userid = $row["userid"];
																$invid = $row["invid"];
																$date = $row["date"];
																$number = $row["number"];
																$prefix = $row["prefix"];
																$subtotal = $row["subtotal"];
																$subtotal = str_replace( ',', '', $subtotal);
																$adjustment = $row["adjustment"];
																$discount_total = $row["discount_total"];
																$company = $row["company"];
																$phone = $row["phonenumber"];
																$amountPaid =$row["amountPaid"];
																$notes = $row["note"];
																$tags = $row["tagName"];
																$bGroup = getVAN($invid);
																$location =$row["location"];
																$salesAgent = $row["firstname"]." ".$row["lastname"];
																$bill_no = $prefix.substr($date, 0,4)."/".str_pad($number,6,"0",STR_PAD_LEFT);
																$lessDiscount = $subtotal - $discount_total;
																$Status = "No Payment";
																$lessDiscount = str_replace( ',', '', $lessDiscount);
																$Outstanding = $lessDiscount - $amountPaid;
																$arrearsAmt = getArrears($userid);
																$arrears = getArrearsID($userid);
																$oldPayment = getPaid($arrears);
																// $
																$arrearsAmt = $arrearsAmt - $oldPayment;
																$amtPayable = $lessDiscount+$arrearsAmt;
																$Outstanding = $amtPayable - $amountPaid;
																// $stat = $amtPayable - $Outstanding;
																if($Outstanding==0){
																	$Status ="Full Payment Made";
																	$color = "green";
																}else if($Outstanding == $amtPayable){
																	$Status = "No Payment";
																	$color = "red";
																}else{
																	$Status = "Part Payment";
																	$color = "blue";
																}

																$x++;
																// money_format("", number);
																// $ndate = date('Y');

																echo "<tr style='color:".$color."'>"."
																		<td>$x</td>
																		<td>$date</td>
																		<td>$userid</td>
																		<td>$bill_no</td>
																		<td>".breakTag($invid)."</td>
																		<td>$company</td>
																		<td>$bGroup</td>
																		<td>$phone</td>
																		<td>$location</td>
																		<td class='text-right'>".number_format($subtotal,2)."</td>
																		<td class='text-right'>".number_format($discount_total,2)."</td>
																		<td class='text-right'>".number_format($arrearsAmt,2)."</td>
																		<td class='text-right'>".number_format($amtPayable,2)."</td>
																		<td class='text-right'>".number_format($amountPaid,2)."</td>
																		<td class='text-right'>".number_format($Outstanding,2)."</td>
																		<td>$Status</td>
																		<td>$salesAgent</td>
																		
																	 </tr>"	
																		// <td class='text-right'> OLD ".number_format($oldPayment,2)."</td>

																			;
																 }




																			
															}
														}


													?>
																				
												</tbody>
											</table>
										</div>
									</div>
								</div>

								

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Scenic</span>
							Systems &copy; 2013-2019
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/dataTables.responsive.min.js"></script>
		<script src="assets/js/dataTables.buttons.min.js"></script>
		<script src="assets/js/buttons.flash.min.js"></script>
		<script src="assets/js/buttons.html5.min.js"></script>
		<script src="assets/js/buttons.print.min.js"></script>
		<script src="assets/js/buttons.colVis.min.js"></script>
		<script src="assets/js/dataTables.select.min.js"></script>
		<!-- <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.19/api/sum().js"></script> -->

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				try{


				tableId = $("table").attr("id")
				var myTable = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {responsive:true,
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": true },{ "bSortable": false }, { "bSortable": true },{ "bSortable": false }, { "bSortable": false },
					   { "bSortable": true },{ "bSortable": false },{ "bSortable": false },{ "bSortable": false },{ "bSortable": false },
					   { "bSortable": true },{ "bSortable": false },{ "bSortable": false },{ "bSortable": false },{ "bSortable": false },
					   { "bSortable": true },{ "bSortable": true }
					],
					"aaSorting": [],
					"lengthMenu": [ [10, 50, 100, 250, 500, -1], [10, 50, 100, 250, 500, "All"] ],

		
			    } );
					

				//Filter By Tags
				 $(".tag").click(function(){
				 	value = $(this).attr("title");
				 	// console.log(value);
				 	myTable.search(value).draw();
				 })

				
				
				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
				
				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					  {
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					  },
					  {
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "excel",
						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: ''
					  }		  
					]
				} );
				myTable.buttons().container().appendTo( $('.tableTools-container') );
				
				//style the message box
				var defaultCopyAction = myTable.button(1).action();
				myTable.button(1).action(function (e, dt, button, config) {
					defaultCopyAction(e, dt, button, config);
					$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
				});
				
				
				var defaultColvisAction = myTable.button(0).action();
				myTable.button(0).action(function (e, dt, button, config) {
					
					defaultColvisAction(e, dt, button, config);
					
					
					if($('.dt-button-collection > .dropdown-menu').length == 0) {
						$('.dt-button-collection')
						.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
						.find('a').attr('href', '#').wrap("<li />")
					}
					$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
				});
			
				////
			
				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
						else $(this).tooltip({container: 'body', title: $(this).text()});
					});
				}, 500);
				
				
				
				
				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/
				
					
				
				



				//Filter

		


				$("#filter li a").click(function(e){ //Picks data from filter links (a)
					e.preventDefault();
					filter = $(this).attr("id");
					row = filter.split("_");
					left = row[0];
					column = row[1];
					$("#hidden").val(filter)
					console.log(filter)
					 myTable
				        .columns( column )
				        .search( left )
				        .draw();

				       


				        if(column =="1"){
				        	if(left=="All"){
				        		myTable
				        	  	.columns(column)
						      	.search(" ")
						    	.draw();
				        		$(".year").val(left);
				        	}else{
				        		myTable
						        .columns( column )
						        .search( left )
						        .draw();
						        $(".year").val(left);
				        	}
				    	}else if(column=="7"){
				    		if(left=="All"){
				        		myTable
				        	  	.columns(column)
						      	.search(" ")
						    	.draw();
				        		$(".loc").val(left);
				        	}else{
				        		myTable
						        .columns( column )
						        .search( left )
						        .draw();
						        $(".loc").val(left);
				        	}
				    	}else if(column=="14"){
				    		if(left=="All"){
				        		myTable
				        	  	.columns(column)
						      	.search(" ")
						    	.draw();
				        		$(".payment").val(left);
				        	}else{
				        		myTable
						        .columns( column )
						        .search( left )
						        .draw();
						        $(".payment").val(left);
				        	}
				    	}else if(column=="15"){
				    		if(left=="All"){
				        		myTable
				        	  	.columns(column)
						      	.search(" ")
						    	.draw();
				        		$(".revC").val(left);
				        	}else{
				        		myTable
						        .columns( column )
						        .search( left )
						        .draw();
						        $(".revC").val(left);
				        	}
				    	}



				        // if(left=="All"){ //All Years
				        	
				        // 	 myTable
						      //   .columns(column)
						      //   .search(" ")
						      //   .draw();
						      //   $(".year").val("All")
				        // }else if(left=="Allp"){// All Payment
				        // 	 myTable
						      //   .columns( column )
						      //   .search( " " )
						      //   .draw();
						      //   $(".payment").val("All")
				        // }else if(left=="AllLoc"){//All Locations
				        // 	myTable
				        // 	.columns(column)
				        // 	.search("")
				        // 	.draw();
				        // 	$(".loc").val("All")

				        // }else if(left=="Allc"){
				        // 	myTable
				        // 	.columns(column)
				        // 	.search("")
				        // 	.draw();
				        // 	$(".revC").val("All")
				        // }
				        // else if(isNaN(left)){
				        // 	$(".payment").val(left)
				        	
				        // }else{
				        // 	$(".year").val(left)
				        // }

				})

		
			
			}catch(exception){
				console.log(exception)
			}
			
			})

				
		</script>
	</body>
</html>
