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
}