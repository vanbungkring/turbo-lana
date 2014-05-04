<?php

class m140504_151327_alter_quote3_status extends CDbMigration
{
	public function up()
	{
		$this->addColumn('quote3','status','int');
	}

	public function down()
	{
		$this->dropColumn('quote3','status');
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