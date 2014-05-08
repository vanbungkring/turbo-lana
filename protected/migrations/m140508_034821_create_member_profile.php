<?php

class m140508_034821_create_member_profile extends CDbMigration
{
	public function up()
	{
		$this->addColumn('member','negara','varchar(255)');
		$this->addColumn('member','kota','varchar(255)');
		$this->addColumn('member','kodePos','varchar(255)');
		$this->addColumn('member','tanggalLahir','date');

		$this->createTable('member_profile_perusahaan', array(
           'id'=>'pk',
           'idMember'=>'varchar(255)',
           'logoPerusahaan'=>'varchar(200)',
           'namaBadanUsaha'=>'varchar(255)',
           'bidangUsaha'=>'varchar(100)',
           'alamat'=>'varchar(255)',
           'kota'=>'varchar(255)',
           'negara'=>'varchar(255)',
           'kodePos'=>'varchar(255)',
           'website'=>'varchar(255)',
           'email'=>'varchar(255)',
           'nomorTelepon'=>'varchar(255)',
           'fax'=>'varchar(255)',
        ));
        $this->createIndex('idMemberIndex','member_profile_perusahaan','idMember',false);
	}

	public function down()
	{
		$this->dropColumn('member','negara');
		$this->dropColumn('member','kota');
		$this->dropColumn('member','kodePos');
		$this->dropColumn('member','tanggalLahir');

		$this->dropTable('member_profile_perusahaan');
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