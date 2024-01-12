<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TeacherscrewsFixture
 */
class TeacherscrewsFixture extends TestFixture
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
                'teachers_id' => 1,
                'crews_id' => 1,
                'users_id' => 1,
            ],
        ];
        parent::init();
    }
}
