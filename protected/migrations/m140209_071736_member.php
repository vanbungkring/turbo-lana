<?php

class m140209_071736_member extends CDbMigration
{
	public function up()
	{
		$this->createTable('member', array(
           'id'=>'pk',
           'namaDepan'=>'VARCHAR(100)',
           'namaBelakang'=>'VARCHAR(100)',
           'email'=>'VARCHAR(50)',
           'nomerTelpon'=>'VARCHAR(40)',
           'namaPerusahaan'=>'VARCHAR(100)',
           'password'=>'character(32)',
        ));
	}

	public function down()
	{
		$this->dropTable('member');
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