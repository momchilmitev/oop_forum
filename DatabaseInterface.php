<?php


interface DatabaseInterface
{
    public function query(string $query): DatabaseStatementInterface;
}