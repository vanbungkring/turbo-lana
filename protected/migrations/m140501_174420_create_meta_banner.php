<?php

class m140501_174420_create_meta_banner extends CDbMigration
{
	public function up()
	{
		$this->addColumn('banner','meta_desc','text');
		$this->addColumn('banner','meta_keyword','text');
	}

	public function down()
	{
		$this->dropColumn('banner','meta_desc','text');
		$this->dropColumn('banner','meta_keyword','text');
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