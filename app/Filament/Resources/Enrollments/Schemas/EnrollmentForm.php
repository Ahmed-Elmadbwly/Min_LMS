<?php

namespace App\Filament\Resources\Enrollments\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EnrollmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('student_id')
                    ->label('Student')
                    ->relationship('student', 'name', fn ($query) =>
                      $query->where('role', 'student')
                    )
                    ->required()
                    ->reactive(),
                Select::make('course_id')
                    ->label('Course')
                    ->relationship('course', 'title',fn ($query,callable $get)  =>
                        $get('student_id')
                            ? $query->notEnrolledBy($get('student_id'))
                            : $query
                    )
                    ->required(),
                Toggle::make('status'),
            ]);
    }
}
