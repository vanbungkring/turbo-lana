<?php

class m140421_141024_set_new_quote extends CDbMigration
{
	public function up()
	{
		$this->dropTable('quote2');
		$this->dropTable('quote2_banner');
		$this->createTable('quote2', array(
           'id'=>'pk',
           'idBanner'=>'int',
           'tanggalAwal'=>'date',
		   'tanggalAkhir'=>'date', 
        ));
	}

	public function down()
	{
		$this->dropTable('quote2');
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