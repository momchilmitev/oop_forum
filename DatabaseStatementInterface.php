<?php

interface DatabaseStatementInterface
{
    public function execute(array $params = []): DatabaseStatementInterface;

    public function fetch(): Generator;
}
