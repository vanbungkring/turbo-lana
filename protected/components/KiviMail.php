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

	public static function sendFileUpdate8($idQuote){
		try {
			$quote3 = Quote3::model()->findByPk($idQuote);
			
			$message = Yii::app()->mailgun->newMessage();
			$message->addTo($quote3->member->email, $quote3->member->namaDepan);
			$message->setSubject('Campaign Quotes Approval');
			$message->renderHtml('file-update-8', array('quote3' => $quote3));

			$message->send();
		} catch (Exception $e) {
			//throw $e;
		}
	}

	public static function sendNewJoinEmail($member){
		try {
	    	$message = Yii::app()->mailgun->newMessage();
			$message->addTo($member->email, $member->namaDepan);
			$message->setSubject('Wellcome To Kiviads');
			$message->renderHtml('new-user', array('member' => $member));

			$message->send();
		} catch (Exception $e) {
			//throw $e;
		}
    }

    public static function sendLinkResetPassword($member){
		try {
	    	$message = Yii::app()->mailgun->newMessage();
			$message->addTo($member->email, $member->namaDepan);
			$message->setSubject('Wellcome To Kiviads');
			$message->renderHtml('reset-password', array('member' => $member));

			$message->send();
		} catch (Exception $e) {
			throw $e;
		}
    }
}