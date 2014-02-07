<?php

class m140207_143951_kategori_size extends CDbMigration
{
	public function up()
	{
		$this->createTable('kategori_size', array(
           'id'=>'pk',
           'nama'=>'VARCHAR(100) not null',
           'lebar'=>'float',
           'tinggi'=>'float',
        ));
	}

	public function down()
	{
		$this->dropTable('kategori_size');
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