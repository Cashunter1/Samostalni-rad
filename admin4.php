<?php include("connect.php");  ?>
<html>
	<head>
		<title>xx</title>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
		<meta http-equiv='content-language' content='hr' />
		<script src="scripts/functions.js" type="text/javascript" language="javascript"></script>
		<script language="javascript" type="text/javascript">
			var win=null;
			function NewWindow(mypage,myname,w,h,scroll,pos){
				if(pos=="random"){LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
				if(pos=="center"){LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
				else if((pos!="center" && pos!="random") || pos==null){LeftPosition=0;TopPosition=20}
				settings='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars=yes,location=no,directories=no,status=yes,menubar=no,toolbar=no,resizable=yes';
				win=window.open(mypage,myname,settings);
			}
		</script>
	</head>
<body>
<form action="admin4.php" method="post" name="admin4">
<body>
<TABLE height='30' width='100%' align='center' cellSpacing='0' cellPadding='3' bgColor='#ffffff' border='0' valign="top" style='border: 1px solid #5D6B84;'>
	<tr>
		<td align='left' width='100' height='30' bgcolor='#ffffff' valign='middle'>
			<A HREF="javascript:window.print()"><IMG SRC="images/printer.png" BORDER="0"</A>
		</td>
		<td align='center' height='30' bgcolor='#ffffff' valign='middle'>
			<font color='#484824' size='4' name='Calibri'>ARTIKLI NA AKCIJI
		</td>
		<td align='right' width='100' height='30' bgcolor='#ffffff' valign='middle'>
		</td>
	</tr>
</table>
<TABLE height='20' width='100%' align='center' cellSpacing='0' cellPadding='3' bgColor='#ffffff' border='0' valign="top" style='border: 1px solid #5D6B84;'>
	<tr>
		<td align='center' height='2' bgcolor='#ffffff' colspan='13'>
			<hr></hr>
		</td>
	</tr>
	<tr>
		<td align='center' height='20' bgcolor='#484824' style='border-right: 1px solid #5D6B84; border-bottom: 1px solid #5D6B84;'><font color='#ffffff' size='2' name='Calibri'>RB</td>
		<td align='center' height='20' bgcolor='#484824' style='border-right: 1px solid #5D6B84; border-bottom: 1px solid #5D6B84;'><font color='#ffffff' size='2' name='Calibri'>ST</td>
		<td align='center' height='20' bgcolor='#484824' style='border-right: 1px solid #5D6B84; border-bottom: 1px solid #5D6B84;'><font color='#ffffff' size='2' name='Calibri'>Šifra</td>
		<td align='center' height='20' bgcolor='#484824' style='border-right: 1px solid #5D6B84; border-bottom: 1px solid #5D6B84;'><font color='#ffffff' size='2' name='Calibri'>Naziv</td>
		<td align='center' height='20' bgcolor='#484824' style='border-right: 1px solid #5D6B84; border-bottom: 1px solid #5D6B84;'><font color='#ffffff' size='2' name='Calibri'>JM</td>
		<td align='center' height='20' bgcolor='#484824' style='border-right: 1px solid #5D6B84; border-bottom: 1px solid #5D6B84;'><font color='#ffffff' size='2' name='Calibri'>M P C</td>
		<td align='center' height='20' bgcolor='#484824' style='border-right: 1px solid #5D6B84; border-bottom: 1px solid #5D6B84;'><font color='#ffffff' size='2' name='Calibri'>Rabat</td>
		<td align='center' height='20' bgcolor='#484824' style='border-right: 1px solid #5D6B84; border-bottom: 1px solid #5D6B84;'><font color='#ffffff' size='2' name='Calibri'>PDV %</td>
		<td align='center' height='20' bgcolor='#484824' style='border-right: 1px solid #5D6B84; border-bottom: 1px solid #5D6B84;'><font color='#ffffff' size='2' name='Calibri'>Akcijska cijena</td>
		<td align='center' height='20' bgcolor='#484824' style='border-right: 1px solid #5D6B84; border-bottom: 1px solid #5D6B84;'><font color='#ffffff' size='2' name='Calibri'>Početak akcije</td>
		<td align='center' height='20' bgcolor='#484824' style='border-right: 1px solid #5D6B84; border-bottom: 1px solid #5D6B84;'><font color='#ffffff' size='2' name='Calibri'>Kraj akcije</td>
	</tr><?php
	$rbroj="";
	$xbroj="";
	$queryb = "SELECT * FROM artikli ORDER BY grupa, naziv";
	$resultb=uzmibazu($queryb);
	while ($row = preuzmi($resultb)) {
	       $onako=$row[0];
		   $rbroj=$rbroj+1;
	       $xbroj=$xbroj+1;
		   echo "<tr onmouseover=\"setPointer(this,".$xbroj.", 'over', '#fffffd', '#d6d6ab', '#fffffd');\" onmouseout=\"setPointer(this,".$xbroj.", 'out', '#fffffd', '#d6d6ab', '#fffffd');\" onmousedown=\"setPointer(this,".$xbroj.", 'click', '#fffffd', '#d6d6ab', '#aeae5e');\">\n";
			   echo "<td align='center' valign='middle' height='20' style='border-bottom: 1px solid #5D6B84; border-right: 1px solid #5D6B84;'><font color='#484824' size='2' name='Calibri'>".$rbroj."</td>";
			   echo "<td align='center' valign='middle' height='20' style='border-bottom: 1px solid #5D6B84; border-right: 1px solid #5D6B84;'><font color='#484824' size='2' name='Calibri'>".$row[19]."</td>";
			   echo "<td align='center' valign='middle' height='20' style='border-bottom: 1px solid #5D6B84; border-right: 1px solid #5D6B84;'>"; ?>
					<a href="admin4i.php?sifar=<?php echo $row[0] ?>" onclick="NewWindow(this.href,'mywin','600','550','yes','center'); return false" onfocus="this.blur()"><font face="Arial" size="2" color="#950000"><b><?php echo $row[0] ?></b></font></a><?php
			   echo "</td>";
			   echo "<td align='left' valign='middle' style='border-bottom: 1px solid #5D6B84; border-right: 1px solid #5D6B84;'><font color='#484824' size='2' name='Calibri'>".$row[1]."</td>";
			   echo "<td align='center' valign='middle' style='border-bottom: 1px solid #5D6B84; border-right: 1px solid #5D6B84;'><font color='#484824' size='2' name='Calibri'>".$row[2]."</td>";;
			   echo "<td align='right' valign='middle' style='border-bottom: 1px solid #5D6B84; border-right: 1px solid #5D6B84;'><font color='#484824' size='2' name='Calibri'>".number_format($row[5],2,',','.')."</td>";
			   echo "<td align='right' valign='middle' style='border-bottom: 1px solid #5D6B84; border-right: 1px solid #5D6B84;'><font color='#484824' size='2' name='Calibri'>";
					if ($row[7]>0){
						echo $row[7];
					}
			   echo "&nbsp;</td>";
			   if ($row[6]>0){
				   echo "<td align='right' valign='middle' style='border-bottom: 1px solid #5D6B84; border-right: 1px solid #5D6B84;'><font color='#484824' size='2' name='Calibri'>".$row[6]."&nbsp;</td>";
			   } else {
				   echo "<td align='center' valign='middle' style='border-bottom: 1px solid #5D6B84; border-right: 1px solid #5D6B84;'>&nbsp;</td>";
			   }
			   if ($row[13]>0){
				   echo "<td align='center' valign='middle' style='border-bottom: 1px solid #5D6B84; border-right: 1px solid #5D6B84;'><font color='#484824' size='2' name='Calibri'>".number_format($row[13],2,',','.')."</td>";
			   } else {
				   echo "<td align='center' valign='middle' style='border-bottom: 1px solid #5D6B84; border-right: 1px solid #5D6B84;'>&nbsp;</td>";
			   }
			   if (substr($row[17],0,4)>"2013"){
				   echo "<td align='center' valign='middle' style='border-bottom: 1px solid #5D6B84; border-right: 1px solid #5D6B84;'><font color='#484824' size='2' name='Calibri'>".substr($row[17],8,2).".".substr($row[17],5,2).".".substr($row[17],0,4)."</td>";
			   } else {
				   echo "<td align='center' valign='middle' style='border-bottom: 1px solid #5D6B84; border-right: 1px solid #5D6B84;'>&nbsp;</td>";
			   }
			   if (substr($row[18],0,4)>"2013"){
				   echo "<td align='center' valign='middle' style='border-bottom: 1px solid #5D6B84; border-right: 1px solid #5D6B84;'><font color='#484824' size='2' name='Calibri'>".substr($row[18],8,2).".".substr($row[18],5,2).".".substr($row[18],0,4)."</td>";
			   } else {
				   echo "<td align='center' valign='middle' style='border-bottom: 1px solid #5D6B84; border-right: 1px solid #5D6B84;'>&nbsp;</td>";
			   }

		   echo "</tr>";
	} ?>
</table></body></html>