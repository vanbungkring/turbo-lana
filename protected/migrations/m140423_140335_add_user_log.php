<?php

class m140423_140335_add_user_log extends CDbMigration
{
	public function up()
	{
		$this->createTable('member_log', array(
           'id'=>'pk',
           'idMember'=>'int',
           'time'=>'datetime',
           'log_data'=>'text',
           'type'=>'int',
        ));
        $this->createIndex('idMemberIndex','member_log','idMember',false);
    }

	public function down()
	{
		$this->dropTable('member_log');
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