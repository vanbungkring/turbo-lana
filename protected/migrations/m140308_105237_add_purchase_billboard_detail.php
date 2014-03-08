<?php

class m140308_105237_add_purchase_billboard_detail extends CDbMigration
{
	public function up()
	{
		$this->createTable('purchase_billboard_detail', array(
           'id'=>'pk',
           'idPurchaseBillboard'=>'int',
           'idBanner'=>'int',
           'qty'=>'int',
           'durasi'=>'varchar(200)',
           'harga'=>'decimal(15,2)',   
        ));
        $this->createIndex('idPurchaseIdIndex','purchase_billboard_detail','idPurchaseBillboard',false);
    }

	public function down()
	{
		$this->dropTable('purchase_billboard_detail');
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