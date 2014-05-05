<?php

class m140424_103058_alter_member_log extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('member_log','log_data');
		$this->addColumn('member_log','data','text');
	}

	public function down()
	{
		$this->dropColumn('member_log','data');
		$this->addColumn('member_log','log_data','text');
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