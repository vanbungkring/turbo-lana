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
 /* List Definitions */
 ol
	{margin-bottom:0in;}
ul
	{margin-bottom:0in;}
-->
</style>

</head>

<body lang=EN-US>

<div class=WordSection1>

<p class=MsoNormal style='line-height:115%'>Hi <?php echo $quote->member->namaDepan; ?>,</p>

<p class=MsoNormal style='line-height:115%'>&nbsp;</p>

<p class=MsoNormal style='line-height:115%'>Anda telah mengkonfirmasi <i>campaign</i>
pada titik <i>billboard</i>:</p>

<p class=MsoNormal style='line-height:115%'>&nbsp;</p>

<p class=MsoNormal style='line-height:115%'><span style='background:yellow'>QUOTES CAMPAIGN #<?php echo $quote->id; ?></span>
</p>

<table>
	<?php
		$total = 0;
		$price_unit = array(); 
		$i = 1;
		foreach ($quote->quoteBanners as $key => $quoteBanner): ?>
		<tr>
			<td>
				<p class=MsoListParagraphCxSpMiddle style='margin-left:.25in;text-indent:-.25in;
					line-height:115%'><?php echo $i++; ?>.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</span><?php echo $quoteBanner->banner->nama; ?></p>
			</td>
			<td>
				<?php echo $quoteBanner->price; ?>
			</td>
		</tr>
		<?php
			$total += $quoteBanner->price;
			$price_unit[] = $quoteBanner->price;
		?>
	<?php endforeach ?>
	<tr>
		<td></td>
		<td><?php echo $total; ?></td>
	</tr>
</table>

<p class=MsoNormal style='line-height:115%'>&nbsp;</p>

<p class=MsoNormal style='line-height:115%'>6 tahapan selanjutnya:</p>

<p class=MsoNormal style='line-height:115%'>&nbsp;</p>

<p class=MsoListParagraphCxSpFirst style='margin-left:.25in;text-indent:-.25in;
line-height:115%'>A.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span>Tim kami akan menghubungi untuk finalisasi kontrak <i>campaign</i></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:.25in;text-indent:-.25in;
line-height:115%'>B.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span>Kirimkan PO (Purchase Order) kepada kami agar <i>campaign</i> dapat
segera kami proses.</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:.25in;text-indent:-.25in;
line-height:115%'>C.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span><i>Invoice</i> akan segera dikirimkan setelah PO (Purchase Order) kami
terima.</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:.25in;text-indent:-.25in;
line-height:115%'>D.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;
</span>Pembayaran DP (<i>down payment</i>) sebesar 50% harap segera dilunasi
selambat-lambatnya 1 (satu) minggu setelah <i>invoice</i> dikirim.</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:.25in;text-indent:-.25in;
line-height:115%'>E.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span>Silahkan <i>upload</i> bukti pembayaran DP (<i>down payment</i>) Anda
pada sistem kami agar dapat kami proses ke tahapan selanjutnya.</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:.25in;text-indent:-.25in;
line-height:115%'>F.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span>Silahkan <i>upload</i> materi kreatif untuk iklan Anda pada sistem kami.</p>

<p class=MsoListParagraphCxSpLast style='margin-left:.25in;text-indent:-.25in;
line-height:115%'>G.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;
</span>DO (Delivery Order) akan dikirimkan begitu <i>campaign</i> Anda
berjalan,</p>

<p class=MsoNormal style='line-height:115%'>&nbsp;</p>

<p class=MsoNormal style='line-height:115%'>Semua dapat Anda lakukan pada <i><u>dashboard
</u></i><u>Campaign anda di Kiviads </u><span style='background:yellow'>(link
ke campaign detail)</span></p>

<p class=MsoNormal style='line-height:115%'>&nbsp;</p>

<p class=MsoNormal style='line-height:115%'>&nbsp;</p>

<p class=MsoNormal style='line-height:115%'>Terima kasih!</p>

<p class=MsoNormal>&nbsp;</p>

</div>

</body>

</html>
