<?php

class m140223_041944_create_quote_banner extends CDbMigration
{
	public function up()
	{
		$this->createTable('quote_banner', array(
           'id'=>'pk',
           'idQuote'=>'int',
           'idBanner'=>'int',   
        ));
        $this->createIndex('idQuoteIndex','quote_banner','idQuote',false);
    }

	public function down()
	{
		$this->dropTable('quote_banner');
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