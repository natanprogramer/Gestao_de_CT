<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CheckListResource\Pages;
use App\Filament\Resources\CheckListResource\RelationManagers;
use App\Models\CheckList;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Paciente;

class CheckListResource extends Resource
{
    protected static ?string $model = CheckList::class;

    protected static ?string $navigationIcon = 'heroicon-o-check';

    protected static ?string $pluralModelLabel = 'CheckList';

    protected static ?string $navigationGroup = 'Cadastro';

    protected static ?string $slug = 'checklist';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('paciente_id')
                    ->required()
                    ->relationship('paciente' , 'primeiro_nome')
                    ->preload()
                    ->searchable()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('calcas')
                    ->label('Calças')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('bermudas_shorts')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cuecas')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pares_de_meia')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('bones')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('conjuntos_de_moleton')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('camisas_camisetas')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pares_de_tenis')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('toalhas')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('lencois')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cobertores')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('travesseiros')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('fronhas')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cadernos')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('canetas')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('caixas_de_sabao_em_po')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pacote_de_sabao_em_barra')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('amaciantes')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('escova_de_roupa')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('sabonetes')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('desodorantes')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cremes_dental')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cremes_de_pele')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('prestobarbas')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('shampoo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('condicionadores')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('observacao_extras')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('paciente.primeiro_nome')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListCheckLists::route('/'),
            'create' => Pages\CreateCheckList::route('/create'),
            'view' => Pages\ViewCheckList::route('/{record}'),
            'edit' => Pages\EditCheckList::route('/{record}/edit'),
        ];
    }
}
