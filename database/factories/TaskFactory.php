<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;


class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $taskNames = [
            'Suplauti Indus',
            'Susitvarkyti Kambarį',
            'Išnešti Šiukšles',
            'Paruošti Vakarienę'
        ];

        $userNames = [
            'Jonas',
            'Antanas'
        ];

        $descriptions = [
            'Suplauti indus ir sudėti į lentyną',
            'Susitvarkyk kambarį, nepamiršk apsivalyti palangės',
            'Išnešk šiukšles, nepamiršk šiukšlių garažę',
            'Paruošk vakariene mūsų visai šeimai'
        ];

        $dates = [
            '2020-12-07',
            '2020-12-02',
            '2020-12-04',
            '2020-12-17'
        ];

        $date = date('Y-m-d H:i:s');

        $randomTask = rand(0, 3);

        return [
            'task_name' => $taskNames[$randomTask],
            'creator' => 'admin',
            'assigned_to' => $userNames[rand(0, 1)],
            'description' => $descriptions[$randomTask],
            'due_to' => $dates[rand(0, 3)],
            'task_status' => 0,
            'created_at' => $date,
            'updated_at' => $date

        ];
    }
}
