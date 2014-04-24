<?php

class m140225_060248_quote_reply extends CDbMigration
{
	public function up()
	{
		$this->createTable('quote_reply', array(
           'id'=>'pk',
           'idQuote'=>'int',
           'type'=>'int',
           'reply'=>'text',
           'time'=>'datetime',
           'idMember'=>'int',
           'idAdmin'=>'int',
        ));
        $this->createIndex('idQuoteIndex','quote_reply','idQuote',false);
    }

	public function down()
	{
		$this->dropTable('quote_reply');
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