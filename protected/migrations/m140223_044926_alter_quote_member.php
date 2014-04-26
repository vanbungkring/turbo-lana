<?php

class m140223_044926_alter_quote_member extends CDbMigration
{
	public function up()
	{
		$this->addColumn('quote','idMember','int');
		$this->alterColumn('quote','replyUntil','date DEFAULT null');
		$this->alterColumn('quote','name','varchar(200)');
		$this->createIndex('idMemberIndex','quote','idMember',false);
	}

	public function down()
	{
		$this->dropColumn('quote','idMember');
		$this->alterColumn('quote','replyUntil','date');
		$this->alterColumn('quote','name','int');
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