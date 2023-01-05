<?php

namespace App\Queue;

use Illuminate\Queue\Failed\FailedJobProviderInterface;

class CypressFailedJobProvider implements FailedJobProviderInterface
{
    public function log($connection, $queue, $payload, $exception)
    {
        // TODO: Implement log() method.
    }

    public function all()
    {
        return [
            [
                'id' => 'cypress-id-1',
                'connection' => 'cypress',
                'queue' => 'cypress-queue',
                'payload' => $this->makePayload('Cypress\Command1'),
                'failed_at' => '2023-01-04 12:08:01',
            ],
            [
                'id' => 'cypress-id-2',
                'connection' => 'cypress',
                'queue' => 'cypress-queue',
                'payload' => $this->makePayload('Cypress\Command2'),
                'failed_at' => '2023-01-04 13:11:53',
            ],
        ];
    }

    protected function makePayload($job): bool|string
    {
        return json_encode(['job' => $job]);
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }

    public function forget($id)
    {
        // TODO: Implement forget() method.
    }

    public function flush($hours = null)
    {
        // TODO: Implement flush() method.
    }
}
