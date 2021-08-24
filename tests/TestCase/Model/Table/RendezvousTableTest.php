<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RendezvousTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RendezvousTable Test Case
 */
class RendezvousTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RendezvousTable
     */
    protected $Rendezvous;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Rendezvous',
        'app.Patients',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Rendezvous') ? [] : ['className' => RendezvousTable::class];
        $this->Rendezvous = $this->getTableLocator()->get('Rendezvous', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Rendezvous);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RendezvousTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\RendezvousTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
