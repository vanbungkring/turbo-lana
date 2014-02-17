<?php

class m140217_132510_banner_add_zoom extends CDbMigration
{
	public function up()
	{
		$this->addColumn('banner','zoom','int after `long`');
	}

	public function down()
	{
		$this->dropColumn('banner','zoom');
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