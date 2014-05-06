<?php

class m140506_024420_add_file_pendukung extends CDbMigration
{
	public function up()
	{
        $this->addColumn('quote3','file1','varchar(255)');
        $this->addColumn('quote3','file2','varchar(255)');
        $this->addColumn('quote3','file3','varchar(255)');
        $this->addColumn('quote3','file4','varchar(255)');
        $this->addColumn('quote3','file5','varchar(255)');
        $this->addColumn('quote3','file6','varchar(255)');
        $this->addColumn('quote3','file7','varchar(255)');
        $this->addColumn('quote3','file8','varchar(255)');
	}

	public function down()
	{
		$this->dropColumn('quote3','file1');
        $this->dropColumn('quote3','file2');
        $this->dropColumn('quote3','file3');
        $this->dropColumn('quote3','file4');
        $this->dropColumn('quote3','file5');
        $this->dropColumn('quote3','file6');
        $this->dropColumn('quote3','file7');
        $this->dropColumn('quote3','file8');
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