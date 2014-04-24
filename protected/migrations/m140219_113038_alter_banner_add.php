<?php

class m140219_113038_alter_banner_add extends CDbMigration
{
	public function up()
	{
		$this->addColumn('banner','hargaPerBulan','decimal(15,2) after `harga`');
		$this->addColumn('banner','hargaPer3Bulan','decimal(15,2) after `hargaPerBulan`');
		$this->addColumn('banner','hargaPer6Bulan','decimal(15,2) after `hargaPer3Bulan`');
		$this->addColumn('banner','hargaPerTahun','decimal(15,2) after `hargaPer6Bulan`');
		$this->addColumn('banner','sku','varchar(200)');
		$this->addColumn('banner','jumlahSisi','int');
	}

	public function down()
	{
		$this->dropColumn('banner','hargaPerBulan');
		$this->dropColumn('banner','hargaPer3Bulan');
		$this->dropColumn('banner','hargaPer6Bulan');
		$this->dropColumn('banner','hargaPerTahun');
		$this->dropColumn('banner','sku');
		$this->dropColumn('banner','jumlahSisi');
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