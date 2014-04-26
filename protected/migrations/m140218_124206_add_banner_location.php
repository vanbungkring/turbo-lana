<?php

class m140218_124206_add_banner_location extends CDbMigration
{
	public function up()
	{
		$this->addColumn('banner','lokasi','varchar(200) after `zoom`');
	}

	public function down()
	{
		$this->dropColumn('banner','lokasi');
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