<?php

namespace App\Filament\Resources\Courses\Pages;

use App\Filament\Resources\Courses\CourseResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCourse extends CreateRecord
{
    protected static string $resource = CourseResource::class;

    protected function afterCreate(): void
    {
        $course = $this->record;

        $lessonCount = (int) ($course->lesson_num ?? 0);

        if ($lessonCount <= 0) {
            return;
        }

        for ($i = 1; $i <= $lessonCount; $i++) {
            $course->lessons()->create([
                'title' => "Lesson {$i}",
                'order' => $i,
            ]);
        }
    }
}
