<?php

namespace App\Filament\Resources\Lessons\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class LessonInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('course_id')
                    ->numeric(),
                TextEntry::make('title'),
                TextEntry::make('video_url'),
                TextEntry::make('video'),
                TextEntry::make('order')
                    ->numeric(),
                IconEntry::make('is_published')
                    ->boolean(),
                TextEntry::make('duration')
                    ->time(),
                IconEntry::make('free')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
