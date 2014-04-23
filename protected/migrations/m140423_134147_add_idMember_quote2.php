<?php

class m140423_134147_add_idMember_quote2 extends CDbMigration
{
	public function up()
	{
		$this->addColumn('quote2','idMember','int');
		$this->createIndex('idMemberIndex','quote2','idMember',false);
	}

	public function down()
	{
		$this->dropColumn('quote2','idMember');
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