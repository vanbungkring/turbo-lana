<?php

class m140311_144703_add_invoice_detail extends CDbMigration
{
	public function up()
	{
		$this->createTable('invoice_detail', array(
           'id'=>'pk',
           'idInvoice'=>'int',
           'idBanner'=>'int',
           'qty'=>'int',
           'durasi'=>'varchar(200)',
           'harga'=>'decimal(15,2)',   
        ));
        $this->createIndex('idInvoiceIndex','invoice_detail','idInvoice',false);
    }

	public function down()
	{
		$this->dropTable('invoice_detail');
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