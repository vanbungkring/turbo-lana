<html>

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=Generator content="Microsoft Word 14 (filtered)">
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin:0in;
	margin-bottom:.0001pt;
	font-size:12.0pt;
	font-family:"Calibri","sans-serif";}
.MsoChpDefault
	{font-family:"Calibri","sans-serif";}
.MsoPapDefault
	{margin-bottom:10.0pt;
	line-height:115%;}
@page WordSection1
	{size:8.5in 11.0in;
	margin:1.0in 1.0in 1.0in 1.0in;}
div.WordSection1
	{page:WordSection1;}
-->
</style>

</head>

<body lang=EN-US>

<div class=WordSection1>

<p class=MsoNormal style='line-height:115%'>Hi <?php echo $member->namaDepan; ?>,</p>

<p class=MsoNormal style='text-align:justify;line-height:115%'>&nbsp;</p>

<p class=MsoNormal style='text-align:justify;line-height:115%'>
Silahkan ikuti link untuk melakukan reset password dan masukkan password baru.</p>

<p class=MsoNormal style='text-align:justify;line-height:115%'>&nbsp;</p>

<p class=MsoNormal style='text-align:justify;line-height:115%'><b>
	<a href="<?php echo Yii::app()->createAbsoluteUrl('site/resetPassword',array('token'=>$member->createTokenReset(),'member'=>$member->id)); ?>"><?php echo Yii::app()->createAbsoluteUrl('site/resetPassword',array('token'=>$member->createTokenReset(),'member'=>$member->id)); ?></a></b> 
</p>

<p class=MsoNormal style='text-align:justify;line-height:115%'>&nbsp;</p>

<p class=MsoNormal style='text-align:justify;line-height:115%'>Terima kasih
telah menggunakan Kiviads!</p>

<p class=MsoNormal>&nbsp;</p>

</div>

</body>

</html>
