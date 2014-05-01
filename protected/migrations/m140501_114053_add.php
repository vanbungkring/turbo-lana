<?php

class m140501_114053_add extends CDbMigration
{
	public function up()
	{
		$this->addColumn('perusahaan','brand','varchar(200)');
	}

	public function down()
	{
		$this->dropColumn('perusahaan','brand');
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