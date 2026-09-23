<?php

namespace App\Filament\Resources\Activities\Schemas;

use App\Filament\Resources\Activities\Tables\ActivitiesTable;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Spatie\Activitylog\Models\Activity;

class ActivityInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('created_at')
                            ->label('When')
                            ->dateTime(),
                        TextEntry::make('causer.name')
                            ->label('Who')
                            ->placeholder('System'),
                        TextEntry::make('event')
                            ->badge(),
                        TextEntry::make('subject_type')
                            ->label('Subject')
                            ->formatStateUsing(fn (?string $state, Activity $record): string => ActivitiesTable::describeSubject($state, $record))
                            ->placeholder('—'),
                        TextEntry::make('description')
                            ->columnSpanFull(),
                        TextEntry::make('changes')
                            ->state(fn (Activity $record): array => self::describeChanges($record))
                            ->listWithLineBreaks()
                            ->placeholder('No attribute changes recorded')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    /**
     * Flatten `attribute_changes` into "field: old → new" lines.
     *
     * @return list<string>
     */
    public static function describeChanges(Activity $record): array
    {
        $old = (array) ($record->attribute_changes?->get('old') ?? []);
        $new = (array) ($record->attribute_changes?->get('attributes') ?? []);

        $lines = [];

        foreach (array_unique([...array_keys($old), ...array_keys($new)]) as $field) {
            $lines[] = sprintf(
                '%s: %s → %s',
                $field,
                self::formatValue($old[$field] ?? null),
                self::formatValue($new[$field] ?? null),
            );
        }

        return $lines;
    }

    private static function formatValue(mixed $value): string
    {
        return match (true) {
            $value === null => '∅',
            is_array($value) => $value === [] ? '[]' : implode(', ', array_map(strval(...), $value)),
            is_bool($value) => $value ? 'true' : 'false',
            default => (string) $value,
        };
    }
}
