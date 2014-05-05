<?php

class m140301_132649_add_uniq_banner extends CDbMigration
{
	public function up()
	{
		$this->addColumn('banner','uniqId','varchar(255)');
		$this->createIndex('uniqIdIndex','banner','uniqId',true);
	}

	public function down()
	{
		$this->dropColumn('banner','uniqId');
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