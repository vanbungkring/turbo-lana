<?php

class m140517_133905_add_notification extends CDbMigration
{
	public function up()
	{
		$this->createTable('member_notifikasi', array(
           'id'=>'pk',
           'idMember'=>'int',
           'params'=>'text',
           'status'=>'int',
           'time'=>'datetime',
        ));
         $this->createIndex('idMemberIndex','member_notifikasi','idMember',false);
	}

	public function down()
	{
		$this->dropTable('member_notifikasi');
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