<?php

class m140504_092838_alter_quote3_banner extends CDbMigration
{
	public function up()
	{
		$this->addColumn('quote3_banner','status','int');
		$this->addColumn('quote3_banner','keterangan','text');
		$this->addColumn('quote3_banner','price','decimal(15,2)');
	}

	public function down()
	{
		$this->dropColumn('quote3_banner','status');
		$this->dropColumn('quote3_banner','price');
		$this->dropColumn('quote3_banner','keterangan');
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