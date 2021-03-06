<?php
declare(strict_types=1);

/**
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Migrations\TestSuite;

use Cake\Datasource\ConnectionManager;
use Cake\Log\Log;
use Cake\TestSuite\ConnectionHelper;
use Migrations\Migrations;
use RuntimeException;

class Migrator
{
    /**
     * @var \Cake\TestSuite\ConnectionHelper
     */
    protected $helper;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->helper = new ConnectionHelper();
    }

    /**
     * Runs one set of migrations.
     * This is useful if all your migrations are located in config/Migrations,
     * or in a single directory, or in a single plugin.
     *
     * For options, {@see \Migrations\Migrations::migrate()}.
     *
     * @param array<string, mixed> $options Migrate options. Connection defaults to `test`.
     * @param bool $truncateTables Truncate all tables after running migrations. Defaults to true.
     * @return void
     */
    public function run(
        array $options = [],
        bool $truncateTables = true
    ): void {
        $this->runMany([$options], $truncateTables);
    }

    /**
     * Runs multiple sets of migrations.
     * This is useful if your migrations are located in multiple sources, plugins or connections.
     *
     * For options, {@see \Migrations\Migrations::migrate()}.
     *
     * Example:
     *
     * $this->runMany([
     *  ['connection' => 'some-connection', 'source' => 'some/directory'],
     *  ['plugin' => 'PluginA']
     * ]);
     *
     * @param array<array<string, mixed>> $options Array of option arrays.
     * @param bool $truncateTables Truncate all tables after running migrations. Defaults to true.
     * @return void
     */
    public function runMany(
        array $options = [],
        bool $truncateTables = true
    ): void {
        // Don't recreate schema if we are in a phpunit separate process test.
        if (isset($GLOBALS['__PHPUNIT_BOOTSTRAP'])) {
            return;
        }

        // Detect all connections involved, and mark those with changed status.
        $connectionsToDrop = [];
        $connectionsList = [];
        foreach ($options as $i => $migrationSet) {
            $migrationSet += ['connection' => 'test'];
            $options[$i] = $migrationSet;
            $connectionName = $migrationSet['connection'];
            if (!in_array($connectionName, $connectionsList)) {
                $connectionsList[] = $connectionName;
            }

            $migrations = new Migrations();
            if (!in_array($connectionName, $connectionsToDrop) && $this->shouldDropTables($migrations, $migrationSet)) {
                $connectionsToDrop[] = $connectionName;
            }
        }

        foreach ($connectionsToDrop as $connectionName) {
            $this->dropTables($connectionName);
        }

        // Run all sets of migrations
        foreach ($options as $migrationSet) {
            $migrations = new Migrations();

            if (!$migrations->migrate($migrationSet)) {
                throw new RuntimeException(
                    sprintf('Unable to migrate fixtures for `%s`.', $migrationSet['connection'])
                );
            }
        }

        // Truncate all connections if required in parameters
        if ($truncateTables) {
            foreach ($connectionsList as $connectionName) {
                $this->truncate($connectionName);
            }
        }
    }

    /**
     * Truncate tables after calling run([], false)
     *
     * For options, {@see \Migrations\Migrations::migrate()}.
     *
     * @param string $connection Connection name to truncate all non-phinx tables
     * @return void
     */
    public function truncate(string $connection): void
    {
        // Don't recreate schema if we are in a phpunit separate process test.
        if (isset($GLOBALS['__PHPUNIT_BOOTSTRAP'])) {
            return;
        }

        $tables = $this->getNonPhinxTables($connection);
        if ($tables) {
            $this->helper->truncateTables($connection, $tables);
        }
    }

    /**
     * Detect if migrations have changed and the database needs to be wiped.
     *
     * @param \Migrations\Migrations $migrations The migrations service.
     * @param array $options The connection options.
     * @return bool
     */
    protected function shouldDropTables(Migrations $migrations, array $options): bool
    {
        Log::write('debug', "Reading migrations status for {$options['connection']}...");

        foreach ($migrations->status($options) as $migration) {
            if ($migration['status'] === 'up') {
                Log::write('debug', 'One or more additional migrations detected.');

                return true;
            }
            if ($migration['missing'] ?? false) {
                Log::write('debug', 'One or more missing migrations detected.');

                return true;
            }
            if ($migration['status'] === 'down') {
                Log::write('debug', 'New migration(s) found.');

                return true;
            }
        }
        Log::write('debug', 'No migration changes detected');

        return false;
    }

    /**
     * Drops the regular tables of the provided connection
     * and truncates the phinx tables.
     *
     * @param string $connection Connection on which tables are dropped.
     * @return void
     */
    protected function dropTables(string $connection): void
    {
        $dropTables = $this->getNonPhinxTables($connection);
        if (count($dropTables)) {
            $this->helper->dropTables($connection, $dropTables);
        }
        $phinxTables = $this->getPhinxTables($connection);
        if (count($phinxTables)) {
            $this->helper->truncateTables($connection, $phinxTables);
        }
    }

    /**
     * Get the list of tables that are phinxlog
     *
     * @param string $connection The connection name to operate on.
     * @return string[] The list of tables that are not related to phinx in the provided connection.
     */
    protected function getPhinxTables(string $connection): array
    {
        $tables = ConnectionManager::get($connection)->getSchemaCollection()->listTables();

        return array_filter($tables, function ($table) {
            return strpos($table, 'phinxlog') !== false;
        });
    }

    /**
     * Get the list of tables that are not phinxlog related.
     *
     * @param string $connection The connection name to operate on.
     * @return string[] The list of tables that are not related to phinx in the provided connection.
     */
    protected function getNonPhinxTables(string $connection): array
    {
        $tables = ConnectionManager::get($connection)->getSchemaCollection()->listTables();

        return array_filter($tables, function ($table) {
            return strpos($table, 'phinxlog') === false;
        });
    }
}
