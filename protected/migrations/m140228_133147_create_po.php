<?php

class m140228_133147_create_po extends CDbMigration
{
	public function up()
	{
		$this->createTable('po', array(
           'id'=>'pk',
           'idQuote'=>'int',
           'idMember'=>'int',
           'time'=>'datetime',
           'namaFile'=>'varchar(255)',
        ));
    }

	public function down()
	{
		$this->dropTable('po');
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