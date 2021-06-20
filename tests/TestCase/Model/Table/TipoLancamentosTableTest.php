<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoLancamentosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoLancamentosTable Test Case
 */
class TipoLancamentosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoLancamentosTable
     */
    protected $TipoLancamentos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TipoLancamentos',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TipoLancamentos') ? [] : ['className' => TipoLancamentosTable::class];
        $this->TipoLancamentos = $this->getTableLocator()->get('TipoLancamentos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TipoLancamentos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
