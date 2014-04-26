<?php

class m140311_132113_add_invoice extends CDbMigration
{
	public function up()
	{
		$this->createTable('invoice', array(
           'id'=>'pk',
           'idPurchaseBillboard'=>'int',
           'idMember'=>'int',
           'tanggal'=>'date',
           'time'=>'datetime',
        ));
        $this->createIndex('idPurchaseBillboardIndex','invoice','idPurchaseBillboard',false);
        $this->createIndex('idMemberndex','invoice','idMember',false);
    }

	public function down()
	{
		$this->dropTable('invoice');
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