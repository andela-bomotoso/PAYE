<!DOCTYPE html>
<html>
<head>
	<title>PAYE CALCULATOR</title>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-6 col-lg-4">
		
		
			<?php 

 if (isset($_POST['submit']))
		 { 
		 $gross = $_POST['Gross'];
		 $monthlygross = $gross/12;
		 $relief = 0.2*$gross;
		 $reliefallowance = $relief + 200000;
		 $pension = 0.08*$gross;
		 $non_taxable = $reliefallowance + $pension;
		 $taxable_income = $gross - $non_taxable;
		 $monthlytaxable=$taxable_income/12;
		 $monthlypension=$pension/12;
		

		 function computeTaxPayable($taxable_income)	{
		 	$taxpayable = 0;
		 	if($taxable_income < 300000)
		 		$taxpayable = computeFirstTax($taxable_income);
		 	elseif($taxable_income < 600000)	
		 		$taxpayable = computeFirstTax($taxable_income) + computeSecondTax($taxable_income);
		 	elseif ($taxable_income < 1100000) 
		 		$taxpayable = computeFirstTax($taxable_income) + computeSecondTax($taxable_income) + computeThirdTax($taxable_income);
		 	elseif ($taxable_income < 1600000) 
		 		$taxpayable = computeFirstTax($taxable_income) + computeSecondTax($taxable_income) + computeThirdTax($taxable_income) + computeFourthTax($taxable_income);
		 	elseif ($taxable_income < 3200000) 
		 		$taxpayable = computeFirstTax($taxable_income) + computeSecondTax($taxable_income) + computeThirdTax($taxable_income) + computeFourthTax($taxable_income) + computeFifthTax($taxable_income);
		 	else
		 		$taxpayable = computeFirstTax($taxable_income) + computeSecondTax($taxable_income) + computeThirdTax($taxable_income) + computeFourthTax($taxable_income) + computeFifthTax($taxable_income) + computeSixthTax($taxable_income);

		 	return $taxpayable;
		 }

		 function computeFirstTax($taxable_income)	{
		 	if($taxable_income < 300000)	{
		 		$firsttax = $taxable_income * 0.07;
		 	}	else {
		 		$firsttax = 0.07 * 300000;
		 	}
		 	return $firsttax;
		 }

		  function computeSecondTax($taxable_income)	{
		  	if($taxable_income < 600000)	{
		 		$secondtax = ($taxable_income - 300000)* 0.11;
		 	}	else {
		 		$secondtax = 0.11 * 300000;
		 	}
		 	return $secondtax;
		 	
		 }

		 function computeThirdTax($taxable_income)	{
		 	if($taxable_income < 1100000)	{
		 		$thirdtax = ($taxable_income - 600000)* 0.15;
		 	}	else {
		 		$thirdtax = 0.15 * 500000;
		 	}
		 	return $thirdtax;
		 }

		 function computeFourthTax($taxable_income)	{

		 	if($taxable_income < 1600000)	{
		 		$fourthtax = ($taxable_income - 1100000)* 0.19;
		 	}	else {
		 		$fourthtax = 0.19 * 500000;
		 	}
		 	return $fourthtax;

		 }

		 function computeFifthTax($taxable_income)	{
		 	if($taxable_income < 3200000)	{
		 		$fifthtax = ($taxable_income - 1600000)* 0.21;
		 	}	else {
		 		$fifthtax = 0.21 * 1600000;
		 	}
		 	return $fifthtax;

		 }

		 function computeSixthTax($taxable_income)	{
		 	return ($taxable_income - 3200000) * 0.24;
		 }
				
	

		$taxpayable = computeTaxPayable($taxable_income);
		$monthlytax = $taxpayable/12;
		$nettakehome = $gross -  $pension - $taxpayable;
		$monthlytakehome = $nettakehome / 12;
		echo "<h2>Results</h2>";
		echo "<h5>The Relief Allowance is  $reliefallowance <br></h5>"; 
		echo "<h5>The Pension  is $pension<br></h5> ";
		echo "<h5>The Total Non Taxable Income  is $non_taxable<br></p> ";
		echo "<h5>The Taxable Income is $taxable_income <br></h5>";
		echo "<h5>The tax Payable on a gross of $gross is $taxpayable</h5>" ;
 }
 ?> 
 <form action="cal.php" method="POST">
			<div class="table-responsive">
  		 <table style="width:50%" border="1">
  <caption>The PAYE Calculator</caption>  			

 <thead>
  			<tr>
				<th></th>
				<th>Annual</th>
				<th>Monthly</th>
			</tr>
			</thead>
			<tbody>
				<tr>
			
			 	<td>Gross Salary
				</td>
			<td>
				<input type="varchar" class="form-control" style="border:none;  width: 98%"  name="Gross" placeholder= "Enter your annual gross salary" value="<?php echo "$gross";?>">
			</td>
			<td> <input type="varchar" class="form-control" style="border:none;  width: 98%" value="<?php echo "$monthlygross";?>" disabled>
			</td>
			</tr>
			<tr>
				<td>Tax Payable</td>
				<td>
				<input type="varchar"  class="form-control" style="border:none;  width: 98%" value="<?php echo "$taxpayable";?>" disabled></td>
				<td><input type="varchar" class="form-control" style="border:none;  width: 98%"  value="<?php echo "$monthlytax";?>" disabled></td>
			</tr>
			<tr>
				<td>Pension Contribution</td>
				<td><input type="varchar" class="form-control" style="border:none;  width: 98%"  value="<?php echo "$pension";?>" disabled>
				</td>

				<td><input type="varchar" class="form-control" style="border:none;  width: 98%" value="<?php echo "$monthlypension";?>"disabled>
				</td>
			</tr>
			<tr>
				<td>Net Takehome Pay</td>
				<td><input type="varchar" class="form-control" style="border:none;  width: 98%" value="<?php echo "$nettakehome";?>" disabled></td>
				<td><input type="varchar" class="form-control" style="border:none;  width: 98%" value="<?php echo "$monthlytakehome";?>" disabled></td>
			</tr>
			<tr>
			<td style="border:none" align="center" valign="middle" colspan="3">
			 <button type="submit"  name="submit" class="btn btn-default"  align = "center" style="background-color: #f44336; color: white;  padding: 14px 25px; text-align: center; text-decoration: none; display: inline-block;">Analyze  Payroll</button>
			 </td>
			 </tr>
			 </tbody>
			 </table>
			 </div>
			</form>
			
	
		</div>
</div>
</div>

</body>
</html>