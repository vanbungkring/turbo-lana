<?php

class m140210_152329_alter_banner_size_perusahaan_keterangan_harga extends CDbMigration
{
	public function up()
	{
		$this->addColumn('banner','keterangan','text');
		$this->addColumn('banner','idSize','int');
		$this->addColumn('banner','idPerusahaan','int');
	}

	public function down()
	{
		$this->dropColumn('banner','keterangan');
		$this->dropColumn('banner','idSize');
		$this->dropColumn('banner','idPerusahaan');
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