<?php

class m140301_142759_purchase_billboard extends CDbMigration
{
	public function up()
	{
		$this->createTable('purchase_billboard', array(
           'id'=>'pk',
           'idPO'=>'int',
           'idOwner'=>'int',
           'tanggal'=>'date',
           'time'=>'datetime',
        ));
        $this->createIndex('idPOIndex','purchase_billboard','idPO',false);
        $this->createIndex('idOwnerIndex','purchase_billboard','idOwner',false);
    }

	public function down()
	{
		$this->dropTable('purchase_billboard');
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