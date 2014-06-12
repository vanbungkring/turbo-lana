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

<p class=MsoNormal style='line-height:115%'>Anda telah mengkonfirmasi campaign
pada titik billboard:</p>

<p class=MsoNormal style='line-height:115%'>&nbsp;</p>

<p class=MsoNormal style='line-height:115%'>QUOTES CAMPAIGN #<?php echo $quote->id; ?>
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
</span>Tim kami akan menghubungi untuk finalisasi kontrak campaign</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:.25in;text-indent:-.25in;
line-height:115%'>B.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span>Kirimkan PO (Purchase Order) kepada kami agar campaign dapat
segera kami proses.</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:.25in;text-indent:-.25in;
line-height:115%'>C.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span>Invoice akan segera dikirimkan setelah PO (Purchase Order) kami
terima.</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:.25in;text-indent:-.25in;
line-height:115%'>D.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;
</span>Pembayaran DP (down payment) sebesar 50% harap segera dilunasi
selambat-lambatnya 1 (satu) minggu setelah invoice dikirim.</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:.25in;text-indent:-.25in;
line-height:115%'>E.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span>Silahkan upload bukti pembayaran DP (down payment) Anda
pada sistem kami agar dapat kami proses ke tahapan selanjutnya.</p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:.25in;text-indent:-.25in;
line-height:115%'>F.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span>Silahkan upload materi kreatif untuk iklan Anda pada sistem kami.</p>

<p class=MsoListParagraphCxSpLast style='margin-left:.25in;text-indent:-.25in;
line-height:115%'>G.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;
</span>DO (Delivery Order) akan dikirimkan begitu campaign Anda
berjalan,</p>

<p class=MsoNormal style='line-height:115%'>&nbsp;</p>

<p class=MsoNormal style='line-height:115%'>Semua dapat Anda lakukan pada <a href="http://beta.kiviads.net/index.php/quote3/campaign">dashboard
Campaign anda di Kiviads</a>

<p class=MsoNormal style='line-height:115%'>&nbsp;</p>

<p class=MsoNormal style='line-height:115%'>&nbsp;</p>

<p class=MsoNormal style='line-height:115%'>Terima kasih!</p>

<p class=MsoNormal>&nbsp;</p>

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

<p class=MsoNormal style='text-align:justify;line-height:115%'>Kiviads by <a href="www.kivibyte.com">Kivibyte</a></p>

<p class=MsoNormal style='text-align:justify;line-height:115%'>Follow
akun Twitter kami: <a href="https://twitter.com/Kivibyte">@kivibyte</a></p>

<p class=MsoNormal style='text-align:justify;line-height:115%'>Gabung
di Facebook Fanpage: <a href="https://www.facebook.com/Kivibyte">Kivibyte</a></p>

<p class=MsoNormal>&nbsp;</p>

</div>

</body>

</html>


</div>

</body>

</html>
