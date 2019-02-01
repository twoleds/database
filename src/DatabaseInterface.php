<?php

namespace Twoleds\Database;

/**
 * Interface DatabaseInterface provides simple interface for accessing databases.
 *
 * @package Twoleds\Database
 */
interface DatabaseInterface
{
    /**
     * Executes the specified SQL and returns ID of the last inserted row.
     *
     * @param string $sql
     * @param mixed ...$params
     *
     * @return string|int
     *
     * @throws DatabaseException
     */
    public function insert($sql, ...$params);

    /**
     * Executes the specified SQL and returns rows as associative arrays.
     *
     * @param string $sql
     * @param mixed ...$params
     *
     * @return array
     *
     * @throws DatabaseException
     */
    public function select($sql, ...$params);

    /**
     * Executes the specified SQL and returns value from first row and column.
     *
     * @param string $sql
     * @param mixed ...$params
     *
     * @return mixed
     *
     * @throws DatabaseException
     */
    public function selectField($sql, ...$params);

    /**
     * Executes the specified SQL and returns first row as associative array.
     *
     * @param string $sql
     * @param mixed ...$params
     *
     * @return array|null
     *
     * @throws DatabaseException
     */
    public function selectRow($sql, ...$params);

    /**
     * Starts a transaction and call the callback function. Transaction will be
     * automatically committed or canceled if an exception occurs.
     *
     * @param callable $callback
     *
     * @return mixed Return value from the callback function.
     *
     * @throws DatabaseException
     */
    public function transactional($callback);

    /**
     * Executes the specified SQL and returns number of affected rows.
     *
     * @param string $sql
     * @param mixed ...$params
     *
     * @return int
     *
     * @throws DatabaseException
     */
    public function update($sql, ...$params);
}
