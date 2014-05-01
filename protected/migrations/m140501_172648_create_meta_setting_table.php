<?php

class m140501_172648_create_meta_setting_table extends CDbMigration
{
	public function up()
	{
		$this->addColumn('setting','meta_desc','text');
		$this->addColumn('setting','meta_keyword','text');
	}

	public function down()
	{
		$this->dropColumn('setting','meta_desc','text');
		$this->dropColumn('setting','meta_keyword','text');
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