<?php
namespace App\Models;

use CodeIgniter\Model;

class ShortUrlModel extends Model
{
	protected $table = 'short_url';
	protected $primaryKey = 'id';

	protected $useAutoIncrement = true;

	protected $returnType = 'array';
	protected $useSoftDeletes = true;

	protected $allowedFields = ['original_url', 'short_url'];
}
