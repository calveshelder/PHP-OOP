<?php

namespace App;

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class S3Storage implements FileStorage {
	public function __construct(protected S3Client $client, protected string $bucket) {
		//
	}

	public function put(string $path, string $content): void {
		$s3Key = $_ENV['S3_KEY'];
		$s3Secret = $_ENV['S3_SECRET'];
		$bucket = $_ENV['S3_BUCKET'];

		$this->client->putObject([
			'Bucket' => $this->bucket,
			'Key' => $path,
			'Body' => $content,
		]);
	}
}
