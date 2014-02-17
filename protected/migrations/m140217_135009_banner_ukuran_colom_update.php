<?php

class m140217_135009_banner_ukuran_colom_update extends CDbMigration
{
	public function up()
	{
		$this->addColumn('banner','panjang','double');
		$this->addColumn('banner','tinggi','double');
		$this->addColumn('banner','tinggiDariTanah','double');
	}

	public function down()
	{
		$this->dropColumn('banner','panjang');
		$this->dropColumn('banner','tinggi');
		$this->dropColumn('banner','tinggiDariTanah');
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