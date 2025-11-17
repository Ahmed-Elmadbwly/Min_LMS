<?php

namespace App\Filament\Resources\Lessons\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;

class LessonForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Step::make('basic info')
                        ->description('name and description')
                        ->schema([
                            Section::make()
                                ->schema([
                                    TextInput::make('title')
                                        ->required(),
                                    Select::make('course_id')
                                        ->label('Course')
                                        ->required()
                                        ->relationship('course', 'title'),
                                ])->columns(2),
                            Textarea::make('description')
                                ->columnSpanFull(),
                            RichEditor::make('content')
                                ->columnSpanFull(),
                        ]),
                    Step::make('video info')
                        ->description('upload video')
                        ->schema([
                            TextInput::make('video_url'),
                            FileUpload::make('video')
                                ->directory('videos')
                                ->acceptedFileTypes(['video/mp4', 'video/mov', 'video/avi'])
                                ->maxSize(102400)
                        ]),
                    Step::make('Setting')
                        ->description('Lesson order , publish and free')
                        ->schema([
                            Section::make()
                                ->schema([
                                    TextInput::make('order')
                                        ->required()
                                        ->numeric()
                                        ->default(1),
                                    Toggle::make('is_published')
                                        ->required(),
                                    TimePicker::make('duration'),
                                    Toggle::make('free')
                                        ->required(),
                                    ])->columns(2),
                        ])
                ])->columnSpanFull(),
            ]);
    }
}
