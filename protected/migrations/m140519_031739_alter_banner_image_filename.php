<?php

class m140519_031739_alter_banner_image_filename extends CDbMigration
{
	public function up()
	{
		$this->addColumn('banner_image','namaFile','varchar(200)');
	}

	public function down()
	{
		$this->dropColumn('banner_image','namaFile');
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