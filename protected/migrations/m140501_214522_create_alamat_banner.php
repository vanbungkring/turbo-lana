<?php

class m140501_214522_create_alamat_banner extends CDbMigration
{
	public function up()
	{
		$this->addColumn('banner','alamat','varchar(200)');
	}

	public function down()
	{
		$this->dropColumn('banner','alamat');
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