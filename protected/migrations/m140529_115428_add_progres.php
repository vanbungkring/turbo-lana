<?php

class m140529_115428_add_progres extends CDbMigration
{
	public function up()
	{
		$this->addColumn('quote3_banner','fileProgress','varchar(200)');
	}

	public function down()
	{
		$this->dropColumn('quote3_banner','fileProgress');
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