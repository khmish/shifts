<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShiftAssignmentResource\Pages;
use App\Filament\Resources\ShiftAssignmentResource\RelationManagers;
use App\Models\ShiftAssignment;
use Carbon\Carbon;
use Closure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ShiftAssignmentResource extends Resource
{
    protected static ?string $model = ShiftAssignment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('shiftmployee_id')
                    ->relationship('shiftmployee', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\DatePicker::make('start'),
                Forms\Components\DatePicker::make('end')
                    ->afterOrEqual('start')->rules([
                        fn (Get $get): Closure => function (string $attribute, $value, Closure $fail) use ($get) {
                           
                            $start = Carbon::parse($get('start'));
                            $end = Carbon::parse($value);
    
                            if ($get('$shiftmployee_id') == 1 ||  $get('$shiftmployee_id') == 2) {
                                if ($end->isAfter($start)) {
                                    # code...
                                } else {
    
                                    $fail("The :attribute is should be after this ");
                                }
                            }
                        },
                    ]),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'pending',
                        'approved' => 'approved',
                        'banned' => 'banned',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([


                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('shiftmployee.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start')
                    // ->nullable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end')
                    // ->nullable()

                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
                Tables\Filters\Filter::make('status')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListShiftAssignments::route('/'),
            'calender' => Pages\ShiftCalender::route('/calender'),
            'create' => Pages\CreateShiftAssignment::route('/create'),
            'edit' => Pages\EditShiftAssignment::route('/{record}/edit'),
        ];
    }
}
