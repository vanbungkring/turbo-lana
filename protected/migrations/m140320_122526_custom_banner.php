<?php

class m140320_122526_custom_banner extends CDbMigration
{
	public function up()
	{
		$this->createTable('custom_banner', array(
           'id'=>'pk',
           'idBanner'=>'int',
           'idMember'=>'int',
           'time'=>'datetime',
        ));
	}

	public function down()
	{
		$this->dropTable('custom_banner');
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