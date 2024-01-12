<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StudentsFixture
 */
class StudentsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'created' => '2023-11-20 19:45:24',
                'modified' => '2023-11-20 19:45:24',
                'modified_by' => 1,
                'users_id' => 1,
            ],
        ];
        parent::init();
    }
}
