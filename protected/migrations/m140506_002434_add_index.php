<?php

class m140506_002434_add_index extends CDbMigration
{
	public function up()
	{
		$this->createIndex('statusIndex','quote3','status',false);
		$this->alterColumn('quote3', 'status', 'int NOT NULL default 0');
	}

	public function down()
	{
		$this->dropIndex('statusIndex','quote3');
		$this->alterColumn('quote3', 'status', 'int');
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