<?php

class m140502_160825_ccreate_quote_3 extends CDbMigration
{
	public function up()
	{
		$this->createTable('quote3', array(
           'id'=>'pk',
           'idMember'=>'int',
           'name'=>'varchar(200)',
           'tanggalMulai'=>'date',
		   'tanggalBerakhir'=>'date',   
		   'budget'=>'decimal(15,2)',
		   'deskripsi'=>'text',
		   'catatan'=>'text',
		   'time'=>'datetime',
		));
		$this->alterColumn('quote3','tanggalBerakhir','date DEFAULT null');
		$this->createIndex('idMemberIndex','quote3','idMember',false);
	}

	public function down()
	{
		$this->dropTable('quote3');
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