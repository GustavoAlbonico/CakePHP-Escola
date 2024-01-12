<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TeacherscrewsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TeacherscrewsTable Test Case
 */
class TeacherscrewsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TeacherscrewsTable
     */
    protected $Teacherscrews;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Teacherscrews',
        'app.Teachers',
        'app.Crews',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Teacherscrews') ? [] : ['className' => TeacherscrewsTable::class];
        $this->Teacherscrews = $this->getTableLocator()->get('Teacherscrews', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Teacherscrews);

        parent::tearDown();
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TeacherscrewsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
