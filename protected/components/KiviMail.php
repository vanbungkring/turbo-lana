<?php
class KiviMail
{
	public static function sendQuoteApproveMail($id){
		try {
			$quote = Quote3::model()->findByPk($id);
			$message = Yii::app()->mailgun->newMessage();
			$message->addTo($quote->member->email, $quote->member->namaDepan);
			$message->setSubject('Campaign Quotes Approval');
			$message->renderHtml('quote-approve', array('quote' => $quote));

			$message->send();
		} catch (Exception $e) {
			
		}
	}

	public static function sendQuoteBannerUpdate($idQuote,$idBanner){
		try {
			$quote = Quote3::model()->findByPk($idQuote);
			$banner = Banner::model()->findByPk($idBanner);
			
			$message = Yii::app()->mailgun->newMessage();
			$message->addTo($quote->member->email, $quote->member->namaDepan);
			$message->setSubject('Campaign Quotes Approval');
			$message->renderHtml('quote-approve', array('quote' => $quote));

			$message->send();
		} catch (Exception $e) {
			
		}
	}

	public static function sendIventoriUpdate7($idQuoteBanner){
		try {
			$quoteBanner = Quote3Banner::model()->findByPk($idQuoteBanner);
			
			$message = Yii::app()->mailgun->newMessage();
			$message->addTo($quoteBanner->quote3->member->email, $quoteBanner->quote3->member->namaDepan);
			$message->setSubject('Campaign Quotes Approval');
			$message->renderHtml('inventory-update-7', array('quote3Banner' => $quoteBanner));

			$message->send();
		} catch (Exception $e) {
			//throw $e;
		}
	}
}