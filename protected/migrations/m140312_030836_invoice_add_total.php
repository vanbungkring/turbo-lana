<?php

class m140312_030836_invoice_add_total extends CDbMigration
{
	public function up()
	{
		$this->addColumn('invoice','total','decimal(15,2)');
		$this->addColumn('invoice','statusLunas','int');
		$this->createIndex('statusLunasIndex','invoice','statusLunas',false);
	}

	public function down()
	{
		$this->dropColumn('invoice','total');
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