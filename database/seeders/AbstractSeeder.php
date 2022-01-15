<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use League\Csv\Reader;

abstract class AbstractSeeder extends Seeder {
	public function __construct(
		public string $table,
		public string $csvFile,
		public string $modelClass
	) {
	}

	/**
	 * Allows sub-classes to perform any record cleanup (like re-hashing passwords).
	 * This is the default function for if the sub-class doesn't have it defined. We return the record unchanged.
	 */
	protected function cleanRecord(array $record): array {
		return $record;
	}

	public function run() {
		DB::table($this->table)->truncate();

		$reader = Reader::createFromPath($this->csvFile, 'r');
		$reader->setHeaderOffset(0);
		$header = $reader->getHeader();
		$headerIndexes = array_flip($header);

		$modelClass = $this->modelClass;
		$records = $reader->getRecords();

		foreach ($records as $offset => $record) {
			$record = $this->cleanRecord($record);

			$model = $modelClass::create($record);
			if (!$model->exists()) {
				throw new \Exception(
					"Unable to process {$this->table} record at offset $offset",
				);
			}
		}
	}
}
