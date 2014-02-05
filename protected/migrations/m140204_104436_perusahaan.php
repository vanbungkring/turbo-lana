<?php

class m140204_104436_perusahaan extends CDbMigration
{
	public function up()
	{
            // id,nama perusahaan, alamat,no telpon, kontak person,website, no telp email
            $this->createTable('perusahaan', array(
               'id'=>'pk',
               'nama'=>'VARCHAR(100) not null',
               'alamat'=>'VARCHAR(255)',
               'noTelpon'=>'VARCHAR(30)',
               'fax'=>'VARCHAR(30)',
               'kontakPerson'=>'VARCHAR(50)',
               'website'=>'VARCHAR(255)',
               'email'=>'VARCHAR(30)',
            ));
	}

	public function down()
	{
		$this->dropTable('perusahaan');
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