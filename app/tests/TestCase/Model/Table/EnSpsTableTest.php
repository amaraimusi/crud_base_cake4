<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EnSpsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EnSpsTable Test Case
 */
class EnSpsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EnSpsTable
     */
    protected $EnSps;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.EnSps',
        'app.BioCls',
        'app.EnCtgs',
        'app.Nekos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('EnSps') ? [] : ['className' => EnSpsTable::class];
        $this->EnSps = $this->getTableLocator()->get('EnSps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->EnSps);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EnSpsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EnSpsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
