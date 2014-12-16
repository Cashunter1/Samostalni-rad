<?php include("connect.php");  ?>
<html>
	<head>
		<title>xx</title>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
		<meta http-equiv='content-language' content='hr' />
		<script src="scripts/functions.js" type="text/javascript" language="javascript"></script>
		<script type="text/javascript" language="javascript" src="script/popcalendar.js"></script>
	</head>
	<form action="admin4i.php" method="post" name="admin4i"><?php
	$poruka = "";
	if (isset($_POST['submit'])) {
		if (isset($_POST["sifra"])){
			$sifra = $_POST["sifra"];
		} else {
			$sifra = "";
		}
		if (isset($_POST["mpcak"])){
			$mpcak = $_POST["mpcak"];
		} else {
			$mpcak = "";
		}
		if (isset($_POST["pocet"])){
			$pocet = $_POST["pocet"];
		} else {
			$pocet = "";
		}
		if (isset($_POST["ponisti"])){
			$ponisti = $_POST["ponisti"];
		} else {
			$ponisti = "";
		}
		if (isset($_POST["krajj"])){
			$krajj = $_POST["krajj"];
		} else {
			$krajj = "";
		}
		if ($ponisti){
			$rezer1="UPDATE artikli SET akcijska_cijena='0', pocetak_akcije='', kraj_akcije='' WHERE sifra='$sifra'";
			$zapisito1=uzmibazu($rezer1);
		    echo("<SCRIPT TYPE=\"text/javascript\">window.opener.location.reload(); self.close();</SCRIPT>");
		} else {
			if ($sifra and $mpcak and $pocet and $krajj){
				$akcod=substr($pocet,6,4)."-".substr($pocet,3,2)."-".substr($pocet,0,2);
				$akcdo=substr($krajj,6,4)."-".substr($krajj,3,2)."-".substr($krajj,0,2);
				$rezer1="UPDATE artikli SET akcijska_cijena='$mpcak', pocetak_akcije='$akcod', kraj_akcije='$akcdo' WHERE sifra='$sifra'";
				$zapisito1=uzmibazu($rezer1);
			    echo("<SCRIPT TYPE=\"text/javascript\">window.opener.location.reload(); self.close();</SCRIPT>");
			} else {
				$poruka="Podaci nisu kompletni. Program nije ništa uradio";
			}
		}
	}
	if (isset($_GET["sifar"])){
		$sifra = $_GET["sifar"];
	} else {
		$sifra = "";
	}

	$dinko = "";
	$upito="SELECT * FROM artikli WHERE sifra='$sifra'";
	$resultat=uzmibazu($upito);
	$terow=preuzmi($resultat);
	$sifra=$terow[0];
	$naziv=$terow[1];
	$jedmj=$terow[2];
	$velic=$terow[3];
	$opihr=$terow[4];
	$mpcij=$terow[5];
	$pdvst=$terow[6];
	$rabat=$terow[7];
	$slika=$terow[8];
	$slikm=$terow[9];
	$grupa=$terow[10];
	$tippp=$terow[11];
	$zalih=$terow[12];
	if ($terow[13]<1){
		$mpcak=$terow[5]-($terow[5]*$terow[7]/100);
	} else {
		$mpcak=$terow[13];
//		$dinko="checked";
	}
	$proiz=$terow[14];
	$rokis=$terow[16];
	if (substr($terow[17],0,4)>"2013"){
		$pocet=substr($terow[17],8,2).".".substr($terow[17],5,2).".".substr($terow[17],0,4);
	} else {
		$pocet=date("d.m.Y");
	}
	if (substr($terow[18],0,4)>"2013"){
		$krajj=substr($terow[18],8,2).".".substr($terow[18],5,2).".".substr($terow[18],0,4);
	} else {
		$krajj=date("d.m.Y");
	}
	if ($terow[19]>0){
		$izbo1="checked";
	} else {
		$izbo2="checked";
	}
	$opien=$terow[20];
	$opinj=$terow[21];
	$opita=$terow[22];
	
	if ($terow[15]<"1"){
		$izb00="checked";
	} elseif ($terow[15]=="1"){
		$izb01="checked";
	} elseif ($terow[15]=="2"){
		$izb02="checked";
	} else {
		$izb03="checked";
	}	?>

	<style type="text/css">
		div.container{
			height: 450px;
		}
		div.vertical-line{
			border-left: 1px solid #808080;
			height: 100%;
			margin-left: auto;
			margin-right: auto;
			width: 1px;
		}
	</style>
	<body onLoad='document.admin2i.sifra.focus();'><?php
	if ($poruka){
		echo "<font color='#c60000' size='3' name='Calibri'>".$poruka."<br>";
	} ?>
	<input type="hidden" name="sifra" value='<?php echo $sifra ?>'>
	<table width="550px" border="0" cellspacing="5" cellpadding="3" align="center" valign='top' height="100" style="border: 0px #8c8c8c solid;">
		<tr>
			<td valign="middle" width="20%" align="right">
				<font color='#484824' size='2' name='Calibri'>Naziv artikla</font>
			</td>
			<td valign="middle" width="80%" align="left">
				<font color='#006a00' size='2' name='Calibri'><b><?php echo $naziv ?>
			</td>
		</tr>
		<tr>
			<td valign="middle" width="20%" align="right">
				<font color='#484824' size='2' name='Calibri'>Jedinica mjere</font>
			</td>
			<td valign="middle" width="80%" align="left">
				<font color='#006a00' size='2' name='Calibri'><b><?php echo $jedmj ?>
			</td>
		</tr>
		<tr>
			<td valign="middle" width="20%" align="right">
				<font color='#484824' size='2' name='Calibri'>M P C</font>
			</td>
			<td valign="middle" width="80%" align="left">
				<font color='#006a00' size='2' name='Calibri'><b><?php echo $mpcij ?>
			</td>
		</tr>
		<tr>
			<td valign="middle" width="20%" align="right">
				<font color='#484824' size='2' name='Calibri'>PDV %</font>
			</td>
			<td valign="middle" width="80%" align="left">
				<font color='#006a00' size='2' name='Calibri'><b><?php echo $pdvst ?>
			</td>
		</tr>
		<tr>
			<td valign="middle" width="20%" align="right">
				<font color='#484824' size='2' name='Calibri'>Popust</font>
			</td>
			<td valign="middle" width="80%" align="left">
				<font color='#006a00' size='2' name='Calibri'><b><?php echo $rabat ?>
			</td>
		</tr>
		<tr>
			<td valign="middle" width="90%" align="center" height="25" colspan='2'>
				<hr></hr>
				<font color='#484824' size='3' name='Calibri'>PODACI O AKCIJI</font>
			</td>
		</tr>
		<tr>
			<td valign="middle" width="20%" align="right">
				<font color='#484824' size='2' name='Calibri'>Cijena</font>
			</td>
			<td valign="middle" width="80%" align="left">
				<input type="text" name="mpcak" value='<?php echo $mpcak ?>' style="width: 263px" onkeypress="return handleEnter(this, event)">
			</td>
		</tr>
		<tr>
			<td valign="middle" width="20%" align="right">
				<font color='#484824' size='2' name='Calibri'>Početak</font>
			</td>
			<td valign="middle" width="80%" align="left">
				<input type="text" name="pocet" value='<?php echo $pocet ?>' style="width: 263px" onkeypress="return handleEnter(this, event)"  onblur="check_date(this)" ondblclick='showCalendar(this, this, "dd.mm.yyyy","hr",1,220,200)'>
			</td>
		</tr>
		<tr>
			<td valign="middle" width="20%" align="right">
				<font color='#484824' size='2' name='Calibri'>Kraj</font>
			</td>
			<td valign="middle" width="80%" align="left">
				<input type="text" name="krajj" value='<?php echo $krajj ?>' style="width: 263px" onkeypress="return handleEnter(this, event)"  onblur="check_date(this)" ondblclick='showCalendar(this, this, "dd.mm.yyyy","hr",1,220,250)'>
			</td>
		</tr>
		<tr>
			<td valign="middle" width="20%" align="right">
			</td>
			<td valign="middle" width="80%" align="left">
				<font color='#484824' size='2' name='Calibri'>
				<input type="checkbox" name="ponisti" value='1' <?php echo $dinko ?> onkeypress="return handleEnter(this, event)"> Poništi podatke o akciji<br>
				<input type='submit' value='Pohrani podatke' name='submit' style='width: 263px;'>
			</td>
		</tr>
	</table>
	</body>
</html>