<?php
/**
 * Copyright 2017 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Cloud\Tests\Snippets\Trace;

use Google\Cloud\Dev\Snippet\SnippetTestCase;
use Google\Cloud\Trace\Connection\ConnectionInterface;
use Google\Cloud\Trace\TraceClient;
use Prophecy\Argument;

/**
 * @group trace
 */
class TraceClientTest extends SnippetTestCase
{
    const BUCKET = 'my-bucket';

    private $connection;
    private $client;

    public function setUp()
    {
        $this->connection = $this->prophesize(ConnectionInterface::class);
        $this->client = new \TraceClientStub;
        $this->client->setConnection($this->connection->reveal());
    }

    public function testClass()
    {
        $snippet = $this->snippetFromClass(TraceClient::class);
        $res = $snippet->invoke('trace');
        $this->assertInstanceOf(TraceClient::class, $res->returnVal());
    }
}
