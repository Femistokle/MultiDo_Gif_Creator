<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Course;
use App\Models\Department;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\Room;
use App\Models\Student;
use App\Models\Teacher;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ru_RU');

        \App\Models\User::factory(10)->create();
//         \App\Models\Admin::factory(10)->create();
        $admin = new Admin();
        $admin->name = 'Сотрудник деканата';
        $admin->email = 'sotrudnik@schedule.test';
        $admin->password = bcrypt('abc');
        $admin->save();

        $departments = ['Медиакоммуникации и Истории Казахстана','Компьютерная инженерия и информационная безопасность', 'Математическое компьютерное моделирование', 'Экономика и бизнес', 'Радиотехника, электроника и телекоммуникации', 'Кафедра языков', 'Информационные системы'];
        foreach ($departments as $department){
            $dep = new Department();
            $dep->name = $department;
            $dep->save();
        }

        $teachers = [
            ['Тулеубеков Асыл Серикович',1], ['Ниязгулова Айгуль Аскарбековна', 1], ['Кипрас Иозович Мажейка ', 1],
            ['Ипалакова Мадина Тулегеновна',2], ['Ускенбаева Раиса Кабиевна', 2], ['Умаров Тимур Фаридович', 2],['Дузбаев Нуржан Токкужаевич', 2],
            ['Ыдырыс Айжан Жұмабайқызы',3], ['Рысбайулы Болатбек', 3], ['Кульпешов Бейбут Шайыкович', 3],
        ];
        foreach ($teachers as $teacher){
            $teach = new Teacher();
            $teach->name = $teacher[0];
            $teach->email = $faker->email();
            $teach->password = bcrypt('123');
            $teach->department_id = $teacher[1];
            $teach->save();
        }

        $groups = ['ВТИПО-2201', 'ВТИПО-2202', 'ВТИПО-2101','ВТИПО-2102'];
        foreach ($groups as $index=>$group){
            $gro = new Group();
            $gro->name = $group;
            $gro->save();

            for ($i=0; $i<($index+1)*3;$i++){

                $student = new Student();
                $student->name = $faker->name();
                $student->email = $faker->email();
                $student->password = bcrypt('123');
                $student->group_id = $gro->id;
                $student->save();
            }
        }
        $rooms = ['901','902','801','802','803','700','701','702'];
        foreach ($rooms as $room) {
            $roo = new Room();
            $roo->number = $room;
            $roo->save();
        }
        $courses = ['Философия', 'Advanced web technologies', 'Web technologies', 'История'];
        foreach ($courses as $index=>$course){
            $cours = new Course();
            $cours->name = $course;
            $cours->group_id = $index+1;
            $cours->teacher_id = $index+1;
            $cours->credits = 2;
            $cours->save();

            $lesson = new Lesson();
            $lesson->course_id = $cours->id;
            $lesson->room_id = $index+1;
            $lesson->type = "Лекция";
            $lesson->day_string = "Понедельник";
            $lesson->day = 1;
            $lesson->time_start = "10:20";
//            $lesson->time_end = "11:10";
            $lesson->save();

            $lesson = new Lesson();
            $lesson->course_id = $cours->id;
            $lesson->room_id = $index+1;
            $lesson->type = "Практика";
            $lesson->day_string = "Понедельник";
            $lesson->day = 1;
            $lesson->time_start = "11:20";
//            $lesson->time_end = "12:10";
            $lesson->save();

            $lesson = new Lesson();
            $lesson->course_id = $cours->id;
            $lesson->room_id = $index+1;
            $lesson->type = "Практика";
            $lesson->day_string = "Понедельник";
            $lesson->day = 1;
            $lesson->time_start = "12:20";
//            $lesson->time_end = "13:10";
            $lesson->save();

            $lesson = new Lesson();
            $lesson->course_id = $cours->id;
            $lesson->room_id = $index+1;
            $lesson->type = "Лабораторная";
            $lesson->day_string = "Понедельник";
            $lesson->day = 1;
            $lesson->time_start = "13:20";
//            $lesson->time_end = "14:10";
            $lesson->save();
        }

    }
}
