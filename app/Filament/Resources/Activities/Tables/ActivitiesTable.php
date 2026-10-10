<?php

namespace App\Filament\Resources\Activities\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Activitylog\Models\Activity;

class ActivitiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query): Builder => $query->with(['causer', 'subject']))
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('created_at')
                    ->label('When')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('causer.name')
                    ->label('Who')
                    ->placeholder('System'),
                TextColumn::make('event')
                    ->badge(),
                TextColumn::make('subject_type')
                    ->label('Subject')
                    ->formatStateUsing(fn (?string $state, Activity $record): string => self::describeSubject($state, $record))
                    ->placeholder('—'),
                TextColumn::make('description')
                    ->searchable()
                    ->wrap(),
            ])
            ->filters([
                SelectFilter::make('event')
                    ->options(fn (): array => Activity::query()->distinct()->whereNotNull('event')->orderBy('event')->pluck('event', 'event')->all()),
                SelectFilter::make('subject_type')
                    ->label('Subject')
                    ->options(fn (): array => Activity::query()->distinct()->whereNotNull('subject_type')->pluck('subject_type', 'subject_type')
                        ->map(fn (string $type): string => class_basename($type))
                        ->all()),
            ], layout: FiltersLayout::AboveContentCollapsible)
            ->emptyStateDescription('Changes to users, roles and settings appear here.')
            ->recordActions([
                ViewAction::make(),
            ]);
    }

    public static function describeSubject(?string $type, Activity $record): string
    {
        if ($type === null) {
            return '—';
        }

        return class_basename($type).' #'.$record->subject_id;
    }
}
