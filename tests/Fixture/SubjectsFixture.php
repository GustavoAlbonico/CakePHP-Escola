<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SubjectsFixture
 */
class SubjectsFixture extends TestFixture
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
                'nome' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-11-27 15:56:28',
                'modified' => '2023-11-27 15:56:28',
                'status' => 1,
                'teachers_id' => 1,
                'users_id' => 1,
            ],
        ];
        parent::init();
    }
}
