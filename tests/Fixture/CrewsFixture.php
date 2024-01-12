<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CrewsFixture
 */
class CrewsFixture extends TestFixture
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
                'created' => '2023-11-20 19:45:45',
                'modified' => '2023-11-20 19:45:45',
                'modified_by' => 1,
                'users_id' => 1,
                'teachers_id' => 1,
                'students_id' => 1,
            ],
        ];
        parent::init();
    }
}
