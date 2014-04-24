<?php

class m140318_083706_create_temp_image extends CDbMigration
{
	public function up()
	{
		$this->createTable('temp_image', array(
           'id'=>'pk',
           'sessionID'=>'varchar(255)',
           'mime'=>'varchar(20)',
           'fileName'=>'varchar(255)',
           'time'=>'datetime',
        ));
        $this->createIndex('sessionIDIndex','temp_image','sessionID',false);
	}

	public function down()
	{
		$this->dropTable('temp_image');
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