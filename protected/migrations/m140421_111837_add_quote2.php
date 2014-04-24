<?php

class m140421_111837_add_quote2 extends CDbMigration
{
	public function up()
	{
		$this->createTable('quote2', array(
           'id'=>'pk',
           'name'=>'int',
           'initialDate'=>'date',
		   'replyUntil'=>'date',   
		   'duration'=>'int',
		   'durationType'=>'int',
		   'budget'=>'int',
		   'description'=>'text',
		   'otherObservations'=>'text'     
        ));
        $this->createTable('quote2_banner', array(
           'id'=>'pk',
           'idQuote'=>'int',
           'idBanner'=>'int',   
        ));
        $this->addColumn('quote2','idMember','int');
		$this->alterColumn('quote2','replyUntil','date DEFAULT null');
		$this->alterColumn('quote2','name','varchar(200)');
		$this->createIndex('idMemberIndex','quote2','idMember',false);
	}

	public function down()
	{
		$this->dropTable('quote2');
		$this->dropTable('quote2_banner');
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