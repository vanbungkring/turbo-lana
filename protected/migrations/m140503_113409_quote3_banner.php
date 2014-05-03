<?php

class m140503_113409_quote3_banner extends CDbMigration
{
	public function up()
	{
		$this->createTable('quote3_banner', array(
           'id'=>'pk',
           'idQuote'=>'int',
           'idBanner'=>'int',   
        ));
        $this->createIndex('idQuoteIndex','quote3_banner','idQuote',false);

	}

	public function down()
	{
		$this->dropTable('quote3_banner');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}