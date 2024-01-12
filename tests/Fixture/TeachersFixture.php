<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TeachersFixture
 */
class TeachersFixture extends TestFixture
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
                'disciplina' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-11-20 19:44:39',
                'modified' => '2023-11-20 19:44:39',
                'modified_by' => 1,
                'users_id' => 1,
            ],
        ];
        parent::init();
    }
}
