<?php

class m140505_111939_alter_banenr_status extends CDbMigration
{
	public function up()
	{
		$this->addColumn('banner','status','int');
	}

	public function down()
	{
		$this->dropColumn('banner','status');
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