<?php /* Template Name: PayeCal */ ?>
<?php
ob_start(); 
/**
 * Theme Header
 *
 * @package	HelpingHands
 * @author Skat
 * @copyright 2015, Skat Design
 * @link http://www.skat.tf
 * @since HelpingHands 1.0
 */
 
global $sd_data;

if ( is_page() || is_single()  ) {
	$transp_header   = rwmb_meta( 'sd_transparent_header', 'type=checkbox');
}
$header_email    = isset( $sd_data['sd_header_email'] ) ? sanitize_email( $sd_data['sd_header_email'] ) : NULL;
$header_phone    = isset( $sd_data['sd_header_phone'] ) ? $sd_data['sd_header_phone'] : NULL;
$header_btn      = isset( $sd_data['sd_extra_button'] ) ? esc_url( $sd_data['sd_extra_button'] ) : NULL;
$header_btn_text = isset( $sd_data['sd_extra_button_text'] ) ? $sd_data['sd_extra_button_text'] : NULL;
$logo            = esc_url( $sd_data['sd_logo_upload']['url'] );
$header_style    = $sd_data['sd_header_style'];
$boxed           = $sd_data['sd_boxed'];
$top_bar         = $sd_data['sd_top_bar'];
$sticky          = $sd_data['sd_sticky_menu'];

?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/framework/js/html5.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/framework/js/respond.min.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>
<body <?php body_class( 'sd-theme' ); ?>>
<div class="sd-wrapper">
<?php if ( $boxed == '2' ) : ?>
	<div class="sd-boxed">
<?php endif; ?>
<header id="sd-header" class="clearfix <?php if ( is_page() && $transp_header == '1' ) { echo 'sd-transparent-bg'; } ?>">

	<?php if ( $top_bar == '1' ) { get_template_part( 'framework/inc/header-top-bar' ); } ?>
	
	<div class="container sd-logo-menu">
		<div class="sd-logo-menu-content">
			<div class="sd-logo">
				<?php if ( ! empty( $logo ) ) : ?>
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <img src="<?php echo $logo; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" /></a>
				<?php else : ?>
					<a name="top" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <?php echo get_bloginfo( 'name' );	?> </a>
				<?php endif; ?>
			</div>
			<!-- sd-logo -->
			
			<?php if ( $header_style == '1' ) : ?>
				<div id="sd-sticky-wrapper" class="sd-header-style1 <?php if ( $sticky == '1' ) { echo 'sd-sticky-header sd-opacity-trans'; } ?>">
					<?php if ( $sticky == '1' ) { echo '<div class="container">'; } ?>
					<?php get_template_part( 'framework/inc/main-menu' ); ?>
					<?php if ( $sticky == '1' ) { echo '</div>'; } ?>
				</div>
			<?php else : ?>
				<?php if ( ! empty( $header_email ) || ! empty( $header_phone ) || ! empty( $header_btn ) ) : ?>
					<div class="sd-header-extra">
						<?php if ( ! empty( $header_email ) ) : ?>
							<div class="sd-header-extra-email clearfix">
								<i class="fa fa-envelope-o"></i>
								<span>
									<span><?php _e( 'EMAIL US AT', 'sd-framework' ); ?></span>
									<a href="mailto:<?php echo antispambot( $header_email, 1 ); ?>" title="<?php _e( 'Email Us', 'sd-framework' ); ?>"><?php echo antispambot( $header_email ); ?></a>
								</span>
							</div>
							<!-- sd-header-extra-email -->
						<?php endif; ?>
						<?php if ( ! empty( $header_phone ) ) : ?>
							<div class="sd-header-extra-phone clearfix">
								<i class="fa fa-phone"></i>
								<span class="sd-header-extra-desc">
									<span><?php _e( 'CALL US NOW', 'sd-framework' ); ?></span>
									<span class="sd-header-ph-number"><?php echo $header_phone; ?></span>
								</span>
							</div>
							<!-- sd-header-extra-phone -->
						<?php endif; ?>
						<?php if ( ! empty( $header_btn ) ) : ?>
							<a class="sd-extra-button" href="<?php echo $header_btn; ?>" title="<?php echo esc_attr( $header_btn_text ); ?>"><?php echo $header_btn_text; ?></a>
						<?php endif; ?>
					</div>
					<!-- sd-header-extra -->
				<?php endif; ?>
			
			<?php endif; ?>

		</div>
		<!-- sd-logo-menu-content -->
	</div>
	<!-- sd-logo-menu -->
	<?php if ( $header_style == '3' ) : ?>
	<div id="sd-sticky-wrapper" class="sd-header-style3 <?php if ( $sticky == '1' ) { echo 'sd-sticky-header sd-opacity-trans'; } ?>">
		<div id="mega-menu-wrap-main-header-menu" class="sd-header-style3 <?php if ( $sticky == '1' ) { echo 'sd-sticky-header sd-opacity-trans'; } ?>">
			<div class="container">
				<?php get_template_part( 'framework/inc/main-menu' ); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
</header>
<!-- #sd-header -->

<?php
	if ( ! is_singular( array( 'post', 'download', 'events', 'staff' ) ) ) {
		get_template_part( 'framework/inc/page-top' );
	}
?>

<?php
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

		  function computeTaxPayable($taxable_income)	{
		 	$taxpayable = 0;
		 	 if ($taxable_income < 0)
		 	 	$taxpayable = 0;
		 	elseif($taxable_income < 300000)
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

		 function assignValues($gross)	{
		 global $grossOutput;
		 $grossOutput = number_format(floatval("$gross"),2,".",",");
		 global $monthlygross ;
		 $monthlygross = $gross/12;
		 global $monthlygrossOutput;
		 $monthlygrossOutput = number_format(floatval("$monthlygross"),2,".",",");
		 global $relief;
		 $relief = 0.2*$gross;
		 global $reliefallowance;
		 $reliefallowance = $relief + 200000;
		 global $pension;
		 $pension = 0.08*$gross;
		 global $pensionOutput;
		 $pensionOutput = number_format(floatval("$pension"),2,".",",");
		 global $non_taxable;
		 $non_taxable = $reliefallowance + $pension;
		 global $taxable_income;
		 $taxable_income = $gross - $non_taxable;
		 global $monthlytaxable;
		 $monthlytaxable = $taxable_income/12;
		 global $monthlypension;
		 $monthlypension=$pension/12;
		 global $monthlypensionOutput;
		 $monthlypensionOutput=number_format(floatval("$monthlypension"),2,".",",");
		 global $taxpayable;
		 $taxpayable = computeTaxPayable($taxable_income);
		 global $taxpayableOutput;
		 $taxpayableOutput = number_format(floatval("$taxpayable"),2,".",",");
		 global $monthlytax;
		 $monthlytax = $taxpayable/12;
		 global $monthlytaxOutput;
		 $monthlytaxOutput = number_format(floatval("$monthlytax"),2,".",",");
		 global $nettakehome;
		 $nettakehome = $gross -  $pension - $taxpayable;
		 global $nettakehomeOutput;
		 $nettakehomeOutput = number_format(floatval("$nettakehome"),2,".",",");
		 global $monthlytakehome;
		 $monthlytakehome = $nettakehome / 12;
		 global $monthlytakehomeOutput;
		 $monthlytakehomeOutput = number_format(floatval("$monthlytakehome"),2,".",",");
		 global $pensioncontribution;
		 $pensioncontribution = $gross*0.1;
		 global $pensioncontributionOutput;
		 $pensioncontributionOutput = number_format(floatval("$pensioncontribution"),2,".",",");
		 global $monthlypensioncontribution;
		 $monthlypensioncontribution = $pensioncontribution/12;
		 global $monthlypensioncontributionOutput;
		 $monthlypensioncontributionOutput = number_format(floatval("$monthlypensioncontribution"),2,".",",");
		 global $totalbenefit;
		 $totalbenefit=$pensioncontribution + $nettakehome + $pension;
		 global $totalbenefitOutput;
		 $totalbenefitOutput=number_format(floatval("$totalbenefit"),2,".",",");
		 global $monthlytotalbenefit;
		 $monthlytotalbenefit= $totalbenefit/12;
		 global $monthlytotalbenefitOutput;
		 $monthlytotalbenefitOutput= number_format(floatval("$monthlytotalbenefit"),2,".",",");
		 global $companyexpense;
		 $companyexpense = $totalbenefit + $taxpayable; 
		 global $companyexpenseOutput;
		 $companyexpenseOutput = number_format(floatval("$companyexpense"),2,".",",");
		 global $monthlycompanyexpense;
		 $monthlycompanyexpense = $companyexpense/12;
		 global $monthlycompanyexpenseOutput;
		 $monthlycompanyexpenseOutput = number_format(floatval("$monthlycompanyexpense"),2,".",",");
		 }
// This will analyze payroll
 if (isset($_POST['submit']))
		 { 
		 $gross = str_replace(",", "", $_POST['Gross']);
		 assignValues($gross);
 	}

 	//This will export the payroll table to excel
 	elseif (isset($_POST['download']))	{
 				$gross = str_replace(",", "", $_POST['Gross']);
		 		assignValues($gross);

 				date_default_timezone_set('GMT');
				require_once  'Classes/PHPExcel.php';
 				$objPHPExcel = new PHPExcel();
 				$objPHPExcel -> getActiveSheet() ->setCellValue('B1', 'Annual');
 				$objPHPExcel -> getActiveSheet() ->setCellValue('C1', 'Monthly');
 				$objPHPExcel -> getActiveSheet() ->setCellValue('D1', 'Explanation');

 				$objPHPExcel -> getActiveSheet() ->setCellValue('A2', 'Gross Salary');
 				$objPHPExcel -> getActiveSheet() ->setCellValue('B2',  $grossOutput);
 				$objPHPExcel -> getActiveSheet() ->setCellValue('C2',  $monthlygrossOutput);
 				$objPHPExcel -> getActiveSheet() ->setCellValue('D2',  'Amount on Employment contract');

 				$objPHPExcel -> getActiveSheet() ->setCellValue('A3',  'Tax Payable');
 				$objPHPExcel -> getActiveSheet() ->setCellValue('B3',  $taxpayableOutput);
 				$objPHPExcel -> getActiveSheet() ->setCellValue('C3',  $monthlytaxOutput);
 				$objPHPExcel -> getActiveSheet() ->setCellValue('D3',  'PAYE deductions to the state tax office');

 				$objPHPExcel -> getActiveSheet() ->setCellValue('A4',  'Pension Contribution');
 				$objPHPExcel -> getActiveSheet() ->setCellValue('B4',  $pensionOutput);
 				$objPHPExcel -> getActiveSheet() ->setCellValue('C4',  $monthlypensionOutput);
 				$objPHPExcel -> getActiveSheet() ->setCellValue('D4',  'Employee portion of pension');

 				$objPHPExcel -> getActiveSheet() ->setCellValue('A5',  'Net Takehome Pay');
 				$objPHPExcel -> getActiveSheet() ->setCellValue('B5',  $nettakehomeOutput);
 				$objPHPExcel -> getActiveSheet() ->setCellValue('C5',  $monthlytakehomeOutput);
 				$objPHPExcel -> getActiveSheet() ->setCellValue('D5',  'Amount on cheque or credited to bank');

 				$objPHPExcel -> getActiveSheet() ->setCellValue('A6',  'Additional Company Expenses');
 				$objPHPExcel -> getActiveSheet() ->mergeCells('A6:D6');


 				$objPHPExcel -> getActiveSheet() ->setCellValue('A7',  'Employer Pension Contribution');
 				$objPHPExcel -> getActiveSheet() ->setCellValue('B7',  $pensioncontributionOutput);
 				$objPHPExcel -> getActiveSheet() ->setCellValue('C7',  $monthlypensioncontributionOutput);
 				$objPHPExcel -> getActiveSheet() ->setCellValue('D7',  '10% of Gross for companies with over 15 employees');

 				$objPHPExcel -> getActiveSheet() ->setCellValue('A8',  'Total Benefit to Employee');
 				$objPHPExcel -> getActiveSheet() ->setCellValue('B8',  $totalbenefitOutput);
 				$objPHPExcel -> getActiveSheet() ->setCellValue('C8',  $monthlytotalbenefitOutput);
 				$objPHPExcel -> getActiveSheet() ->setCellValue('D8',  'payroll and pension benefits, excluding taxes');

 				$objPHPExcel -> getActiveSheet() ->setCellValue('A9',  'Total Company Expense on Employee');
 				$objPHPExcel -> getActiveSheet() ->setCellValue('B9',  $companyexpenseOutput);
 				$objPHPExcel -> getActiveSheet() ->setCellValue('C9',  $monthlycompanyexpenseOutput);
 				


 				$objPHPExcel -> getActiveSheet() ->setTitle('paye_calculator');
				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
				ob_end_clean();
				header('Content-Type: application/vnd.ms-excel');
				header('Content-Disposition: attachment; filename="payroll.xlsx"'); 
				$objWriter->save('php://output');
 		}

 		//This will reset the values
 		else
 		{
 			$monthlygrossOutput = "0.00";
 			$monthlypensionOutput = "0.00";
			$pensionOutput = "0.00";
			$taxpayableOutput = "0.00";
			$monthlytaxOutput = "0.00";
			$nettakehomeOutput = "0.00";
			$monthlytakehomeOutput = "0.00";
			$pensioncontributionOutput = "0.00";
			$monthlypensioncontributionOutput = "0.00";
			$totalbenefitOutput = "0.00";
			$monthlytotalbenefitOutput = "0.00";
			$companyexpenseOutput = "0.00";
			$monthlycompanyexpenseOutput = "0.00";
 		}
?>

<!DOCTYPE>
<html>
<head>
	<title>PAYE CALCULATOR</title>
	<style>
		input:focus {
   		outline:none;
	}

		input[disabled] {
    	background-color: #DCDAD1;
    	padding: 2px;
    	margin: 0 0 0 0;
    	background-image: none;

	</style>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="container">
	<div class="row">
 <form action="http://nairapayroll.com/paye-calculator/" method="POST">
			<div class="table-responsive">
  		 <table id = "paye_calculator" class=" w3-table-all w3-card-4 w3-panel w3-border-0" width="40%">
			<thead>
			<tr>
				<th style="border:none" align="center" valign="middle" colspan="4">
				<div style = "text-align: right;">
			  <h3 style = "margin: 0; text-align: center;"> The PAYE Calculator </h3>

   <button type="submit" name="download" style = "border:0px; background: transparent; outline: none">
    <i class="fa fa-download"  title = "Download Table As Excel" style="font-size:36px;color:green; padding-right: 120px;"></i> 
    </button>
			  </div>
				</th>
			</tr>
			
  			<tr>
				<th></th>
				<th>Annual</th>
				<th>Monthly</th>
				<th>Explanation</th>
			</tr>
			</thead>
			<tbody>
				<tr>
			
			 	<td>Gross Salary
				</td>
			<td>
				<input type="varchar" class="form-control w3-round-xxlarge" name="Gross" placeholder= "Annual gross salary" value="<?php echo "$grossOutput";?>">
			</td>
			<td> <input type="varchar" class="form-control w3-round-xxlarge"  name = "MonthlyGross" value="<?php echo "$monthlygrossOutput";?>" disabled>
			</td>
			<td>Amount on Employment contract </td>
			</tr>
			<tr>
				<td>Tax Payable</td>
				<td>
				<input type="varchar"  class="form-control w3-round-xxlarge" name = "TaxPayable" value="<?php echo "$taxpayableOutput";?>" disabled></td>
				<td><input type="varchar" class="form-control w3-round-xxlarge" name = "MonthlyTax" value="<?php echo "$monthlytaxOutput";?>" disabled></td>
				<td>PAYE deductions to the state tax office	</td>
			</tr>
			<tr>
				<td>Pension Contribution</td>
				<td><input type="varchar" class="form-control w3-round-xxlarge" name = "Pension"  value="<?php echo "$pensionOutput";?>" disabled>
				</td>

				<td><input type="varchar" class="form-control w3-round-xxlarge" name = "MonthlyPension"  value="<?php echo "$monthlypensionOutput";?>" disabled>
				</td>
				<td>Employee portion of pension	</td>
			</tr>
			<tr>
				<td>Net Takehome Pay</td>
				<td><input type="varchar" class="form-control w3-round-xxlarge" name = "NetTakeHome"  value="<?php echo "$nettakehomeOutput";?>" disabled></td>
				<td><input type="varchar" class="form-control w3-round-xxlarge" name = "MonthlyTakeHome" value="<?php echo "$monthlytakehomeOutput";?>" disabled></td>
				<td>Amount on cheque or credited to bank</td>
			</tr>
			<tr>
				<td style="border:none" align="center" valign="middle" colspan="4">Additional Company Expenses:	</td>
			</tr>
			<tr>
				<td>Employer Pension Contribution </td>
				<td><input type="varchar" class="form-control w3-round-xxlarge" name = "PensionContribution"  value="<?php echo "$pensioncontributionOutput";?>" disabled></td>
				<td><input type="varchar" class="form-control w3-round-xxlarge"   name = "MonthlyPensionContribution" value="<?php echo "$monthlypensioncontributionOutput";?>" disabled></td>
				<td>10% of Gross for companies with over 15 employees	</td>
			</tr>
			<tr>
				<td>Total Benefit to Employee</td>
				<td><input type="varchar" class="form-control w3-round-xxlarge" name = "TotalBenefit"  value="<?php echo "$totalbenefitOutput";?>" disabled></td>
				<td><input type="varchar" class="form-control w3-round-xxlarge" name = "MonthlyTotalBenefit" value="<?php echo "$monthlytotalbenefitOutput";?>" disabled></td>
				<td> payroll and pension benefits, excluding taxes</td>
			</tr>
			
			<tr>
				<td>Total Company Expense on Employee</td>
				<td><input type="varchar" class="form-control w3-round-xxlarge"  name = "CompanyExpense" value="<?php echo  "$companyexpenseOutput";?>" disabled></td>
				<td><input type="varchar" class="form-control w3-round-xxlarge" name = "MonthlyCompanyExpense" value="<?php echo "$monthlycompanyexpenseOutput";?>" disabled></td>
				<td> </td>
			</tr>
			<tr>
				<td style="border:none" align="center" valign="middle" colspan="2">
				<div style="text-align:center;">
			  <button  class="w3-button w3-green w3-round-large w3-hover-teal" title= "Click to analyze payroll" type="submit"  name="submit" >Analyze  Payroll</button>
			  </div>
				</td>
				<td style="border:none" align="center" valign="middle" colspan="2">
				<div style="text-align:center;">
  			  <button  class="w3-button w3-green w3-round-large w3-hover-teal" title= "Reset payroll values" type="submit"  name="reset">Reset</button>
  			 </div>
				</td>
			</tr>
			  </tbody>
			 </table>
			 </div>
			</form>
</div>
</div>

</body>
</html>
 


 
<!--FOOTER SECTION -->

<?php
/**
 * Theme Footer
 *
 * @package	HelpingHands
 * @author Skat
 * @copyright 2015, Skat Design
 * @link http://www.skat.tf
 * @since HelpingHands 1.0
 */

global $sd_data;

$body_boxed        = $sd_data['sd_boxed'];
$boxed_footer      = $sd_data['sd_boxed_footer'];
$widgetized_footer = $sd_data['sd_widgetized_footer'];
$footer_sidebars   = $sd_data['sd_footer_sidebars'];
$copyright         = $sd_data['sd_copyright'];
$minicart_enabled  = ( isset( $sd_data['sd_minicart_top'] ) ? $sd_data['sd_minicart_top'] : '' );
$minicart_main     = ( isset ( $sd_data['sd_minicart_main'] ) ? $sd_data['sd_minicart_main'] : '' );
$newsletter        = $sd_data['sd_newsletter'];
wp_reset_query();
if ( is_page() ) {
	$newsletter_hide = rwmb_meta( 'sd_hide_newsletter', 'type=checkbox');
} else {
	$newsletter_hide = '';
}

?>
<?php if ( $boxed_footer == 1 ) : ?>
<div class="sd-boxed-footer">
	<div class="container">
<?php endif; ?>
<?php if ( $newsletter == 1 ) {
	if ( $newsletter_hide !== '1' ) {
	get_template_part( 'framework/inc/newsletter' );
	}
} ?>
<footer id="sd-footer" class="<?php if ( $widgetized_footer == '0' ) echo 'sd-padding-none'; ?>">
	<?php 
		if ( $widgetized_footer == '1' ) { 
			if ( $footer_sidebars == '3' ) {
				get_template_part( 'framework/inc/3-sidebars-footer' );
			} else {
				get_template_part( 'framework/inc/4-sidebars-footer' );
			}
		} 
	?>
	<?php if ( $copyright == 1 ) { get_template_part( 'framework/inc/copyright' ); } ?>
</footer>
<!-- footer end -->
<?php if ( $boxed_footer == 1 ) : ?>
	</div>
	<!-- container -->
</div>
<!-- sd-boxed-footer -->
<?php endif; ?>
<?php if ( $body_boxed == 2 ) : ?>
</div>
<!-- sd-boxed -->
<?php endif; ?>
</div>
<!-- sd-wrapper -->
<?php
	if ( sd_is_woo() ) {
		if ( $minicart_enabled == 1 || $minicart_main == 1 ) {
		  get_template_part( 'framework/inc/minicart' );
		}
	}
?>
<?php wp_footer(); ?>
</body>
</html>