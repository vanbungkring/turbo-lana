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
p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.5in;
	margin-bottom:.0001pt;
	font-size:12.0pt;
	font-family:"Calibri","sans-serif";}
p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.5in;
	margin-bottom:.0001pt;
	font-size:12.0pt;
	font-family:"Calibri","sans-serif";}
p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.5in;
	margin-bottom:.0001pt;
	font-size:12.0pt;
	font-family:"Calibri","sans-serif";}
p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.5in;
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

<p class=MsoNormal style='line-height:115%'>Hi <?php echo $quote->member->namaDepan; ?>,</p>

<p class=MsoNormal style='line-height:115%'>&nbsp;</p>

<p class=MsoNormal style='line-height:115%'>Berikut adalah informasi <i>quotation</i>
dari titik <i>billboard</i> yang telah di-<i>request</i>:</p>

<?php foreach ($quote->quoteBanners as $key => $quoteBanner): ?>
	<p class=MsoNormal style='line-height:115%'>&nbsp;</p>

	<p class=MsoListParagraphCxSpFirst style='margin-left:.25in;line-height:115%'><?php echo $quoteBanner->banner->nama; ?></p>

	<p class=MsoListParagraphCxSpMiddle style='margin-left:.25in;line-height:115%'>Status
	: <?php echo $quoteBanner->getTextStatus(); ?> </p>

	<p class=MsoListParagraphCxSpLast style='margin-left:.25in;line-height:115%'>Harga
	: <?php echo $quoteBanner->price; ?></p>

	<p class=MsoNormal style='line-height:115%'>&nbsp;</p>
<?php endforeach ?>


<p class=MsoNormal style='line-height:115%'>Untuk mengkonfirmasi titik <i>billboard</i>
yang telah Anda pilih atau melakukan perubahan, silahkan klik <a href="<?php echo LHtml::createClientUrl('/quote3/view',array('id'=>$quote->id)); ?>" /><b><span
style='color:#C0504D'>DISINI</span></b></a>. <span style='background:yellow'>(<i>di
link ke quotes-detail</i>)</span></p>

<p class=MsoNormal style='line-height:115%'>&nbsp;</p>

<p class=MsoNormal style='line-height:115%'>Terima kasih!</p>

<p class=MsoNormal>&nbsp;</p>

</div>

</body>

</html>
