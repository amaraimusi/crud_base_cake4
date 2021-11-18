<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NekosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NekosTable Test Case
 */
class NekosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NekosTable
     */
    protected $Nekos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Nekos',
        'app.EnSps',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Nekos') ? [] : ['className' => NekosTable::class];
        $this->Nekos = $this->getTableLocator()->get('Nekos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Nekos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\NekosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\NekosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
