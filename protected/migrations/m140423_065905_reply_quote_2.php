<?php

class m140423_065905_reply_quote_2 extends CDbMigration
{
	public function up()
	{
		$this->createTable('quote2_reply', array(
           'id'=>'pk',
           'idQuote'=>'int',
           'type'=>'int',
           'reply'=>'text',
           'time'=>'datetime',
           'idMember'=>'int',
           'idAdmin'=>'int',
        ));
        $this->createIndex('idQuoteIndex','quote2_reply','idQuote',false);
    }

	public function down()
	{
		$this->dropTable('quote2_reply');
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