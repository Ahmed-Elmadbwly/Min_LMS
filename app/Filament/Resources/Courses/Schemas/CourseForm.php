<?php

namespace App\Filament\Resources\Courses\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CourseForm
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
                                        ->required()
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(function ($state, $set) {
                                            $set('slug', Str::slug($state));
                                        }),
                                    TextInput::make('slug')
                                        ->required()
                                        ->disabled()
                                        ->dehydrated()
                                        ->unique('courses', 'slug'),
                                ])->columns(2),
                            RichEditor::make('Description'),
                        ]),
                    Step::make('files')
                        ->description('image')
                        ->schema([
                            FileUpload::make('image')
                                ->disk('public')
                                ->image(),
                        ]),
                    Step::make('pricing')
                        ->description('pricing and discount')
                        ->schema([
                            Section::make()
                            ->schema([
                                TextInput::make('price')
                                    ->numeric()
                                    ->prefix('$'),
                                TextInput::make('discount')
                                    ->numeric(),
                                DatePicker::make('discount_expire'),
                                Toggle::make('paid')
                                    ->required(),
                            ])->columns(2),
                        ]),
                    Step::make('settings')
                        ->description('course status and level')
                        ->schema([
                            Select::make('status')
                                ->options(['published' => 'Published', 'unpublished' => 'Unpublished'])
                                ->default('published')
                                ->required(),
                            Select::make('level_id')
                                ->label('Level')
                                ->relationship('level', 'name')
                                ->required(),
                            TextInput::make('lesson_num')
                                ->required()
                                ->numeric(),
                        ]),
                ])
                    ->columnSpanFull()
            ]);
    }
}
