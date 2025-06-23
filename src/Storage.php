<?php

namespace App;

use Aws\S3\S3Client;

class Storage {
	public static function resolve() {
		$storageMethod = $_ENV['FILE_STORAGE'];

		if ($storageMethod === 'local') {
			return new LocalStorage();
		} else {
			$client = new S3Client([
				'version' => 'latest',
				'region' => 'us-east-1',
				'credentials' => [
					'key' => $_ENV['S3_KEY'],
					'secret' => $_ENV['S3_SECRET'],
				]
			]);

			return new S3Storage($client, $_ENV['S3_BUCKET']);
		}
	}
}
