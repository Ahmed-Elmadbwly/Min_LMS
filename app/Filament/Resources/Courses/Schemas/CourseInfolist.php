<?php

namespace App\Filament\Resources\Courses\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CourseInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('slug'),
                ImageEntry::make('image'),
                IconEntry::make('paid')
                    ->boolean(),
                TextEntry::make('price')
                    ->money(),
                TextEntry::make('discount')
                    ->numeric(),
                TextEntry::make('discount_expire')
                    ->date(),
                TextEntry::make('status'),
                TextEntry::make('level.name')->label('Level'),
                TextEntry::make('lesson_num'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
