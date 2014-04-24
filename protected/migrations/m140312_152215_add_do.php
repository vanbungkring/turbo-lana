<?php

class m140312_152215_add_do extends CDbMigration
{
	public function up()
	{
		$this->createTable('do', array(
           'id'=>'pk',
           'idPO'=>'int',
           'idMember'=>'int',
           'tanggal'=>'date',
           'time'=>'datetime',
        ));
        $this->createIndex('idPOIndex','do','idPO',false);
        $this->createIndex('idMemberIndex','do','idMember',false);

		$this->createTable('do_detail', array(
           'id'=>'pk',
           'idDo'=>'int',
           'idBanner'=>'int',
           'qty'=>'int',
        ));
        $this->createIndex('idDoIndex','do_detail','idDo',false);
    }

	public function down()
	{
		$this->dropTable('do');
		$this->dropTable('do_detail');
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