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

<p class=MsoNormal style='text-align:justify;line-height:115%'><i>Request</i> <i>quote</i>
Anda telah terkirim dengan sukses! Berikut titik <i>billboard</i> yang Anda <i>request</i>:</p>

<p class=MsoNormal style='text-align:justify;line-height:115%'>&nbsp;</p>

<?php foreach ($quote->banners as $key => $value): ?>
	<a href="<?php echo Yii::app()->createAbsoluteUrl('/site/detail',array('id'=>$value->id)); ?>"><p class=MsoNormal style='text-align:justify;line-height:115%'><u> <?php echo $value->sku; ?>
	<?php echo $value->nama; ?> </u> </a>
<?php endforeach ?>

<p class=MsoNormal style='text-align:justify;line-height:115%'>&nbsp;</p>

<p class=MsoNormal style='text-align:justify;line-height:115%'>Kami akan segera
mengirimkan informasi <i>quotation</i> titik <i>billboard</i> yang telah Anda <i>request</i>.</p>

<p class=MsoNormal style='text-align:justify;line-height:115%'>&nbsp;</p>

<p class=MsoNormal style='text-align:justify;line-height:115%'>Klik <b><a href="<?php echo Yii::app()->createAbsoluteUrl('/quote3/view',array('id'=>$quote->id)) ?>"><span
style='color:#C0504D'>DISINI </span></a></b><span style='background:yellow'></span>untuk menuju ke dashboard dan mengatur Quotes
Detail  Anda! </p>

<p class=MsoNormal style='text-align:justify;line-height:115%'>&nbsp;</p>

<p class=MsoNormal style='text-align:justify;line-height:115%'>Terima kasih!</p>

<p class=MsoNormal style='text-align:justify;line-height:115%'>&nbsp;</p>

<p class=MsoNormal style='text-align:justify;line-height:115%'>---</p>

<p class=MsoNormal style='text-align:justify;line-height:115%'>&nbsp;</p>

<p class=MsoNormal style='text-align:justify;line-height:115%'>Apabila Anda
memerlukan bantuan, jangan ragu untuk menghubungi kami di:</p>

<p class=MsoNormal style='text-align:justify;line-height:115%'>&nbsp;</p>

<p class=MsoNormal style='text-align:justify;line-height:115%'>Telp: 021 71 29
29 73</p>

<p class=MsoNormal style='text-align:justify;line-height:115%'>Email:
support@kiviads.net</p>

<p class=MsoNormal>&nbsp;</p>

</div>

</body>

</html>
