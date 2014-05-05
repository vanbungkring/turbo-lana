<?php

class m140312_144703_add_payment extends CDbMigration
{
	public function up()
	{
		$this->createTable('payment', array(
           'id'=>'pk',
           'idInvoice'=>'int',
           'tanggal'=>'date',
           'jumlah'=>'decimal(15,2)',
           'cara'=>'int',
           'catatan'=>'text', 
        ));
        $this->createIndex('idInvoiceIndex','payment','idInvoice',false);
    }

	public function down()
	{
		$this->dropTable('payment');
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