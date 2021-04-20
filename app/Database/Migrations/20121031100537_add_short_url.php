<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddShortUrl extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'original_url' => [
				'type' => 'TEXT',
			],
			'short_url' => [
				'type' => 'TEXT',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('short_url');
	}

	public function down()
	{
		$this->forge->dropTable('short_url');
	}
}
