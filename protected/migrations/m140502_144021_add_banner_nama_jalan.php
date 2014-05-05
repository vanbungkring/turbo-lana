<?php

class m140502_144021_add_banner_nama_jalan extends CDbMigration
{
	public function up()
	{
		$this->addColumn('banner','formatedAddress','varchar(255)');
	}

	public function down()
	{
		$this->dropColumn('banner','formatedAddress');
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