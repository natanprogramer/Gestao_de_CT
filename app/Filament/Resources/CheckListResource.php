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
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Fieldset;

class CheckListResource extends Resource
{
    protected static ?string $model = CheckList::class;

    protected static ?string $navigationIcon = 'heroicon-o-check';

    protected static ?string $pluralModelLabel = 'CheckList';

    protected static ?string $navigationGroup = 'Cadastro';

    protected static ?string $slug = 'checklist';

    protected static ?string $recordTitleAttribute = 'paciente.primeiro_nome';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Check List')
                ->schema([
                    Forms\Components\Select::make('paciente_id')
                    ->label('Selecione o nome do paciente')
                    ->required()
                    ->relationship('paciente' , 'primeiro_nome')
                    ->preload()
                    ->searchable()
                    ->columnSpanFull(),
                Forms\Components\Select::make('calcas')
                ->placeholder('Selecione a quantidade')
                ->label('Quantidade de calças')
                ->options([
                    '0'                     =>  '0',
                    '1'                     =>  '1',
                    '2'                     =>  '2',
                    '3'                     =>  '3',
                    '4'                     =>  '4',
                    '5'                     =>  '5',
                    '6'                     =>  '6',
                    '7'                     =>  '7',
                    '8'                     =>  '8',
                    '9'                     =>  '9',
                    '10'                    =>  '10',
                    'Mais de dez'           =>  'Mais de dez',

                    ])
                ->required(),
                Forms\Components\Select::make('bermudas_shorts')
                ->placeholder('Selecione a quantidade')
                ->label('Quantidade de Bermudas ou Shorts')
                ->options([
                    '0'                     =>  '0',
                    '1'                     =>  '1',
                    '2'                     =>  '2',
                    '3'                     =>  '3',
                    '4'                     =>  '4',
                    '5'                     =>  '5',
                    '6'                     =>  '6',
                    '7'                     =>  '7',
                    '8'                     =>  '8',
                    '9'                     =>  '9',
                    '10'                    =>  '10',
                    'Mais de dez'           =>  'Mais de dez',

                    ])
                ->required(),
                Forms\Components\Select::make('cuecas')
                    ->placeholder('Selecione a quantidade')
                    ->label('Quantidade de Cuecas')
                    ->options([
                        '0'                     =>  '0',
                        '1'                     =>  '1',
                        '2'                     =>  '2',
                        '3'                     =>  '3',
                        '4'                     =>  '4',
                        '5'                     =>  '5',
                        '6'                     =>  '6',
                        '7'                     =>  '7',
                        '8'                     =>  '8',
                        '9'                     =>  '9',
                        '10'                    =>  '10',
                        'Mais de dez'           =>  'Mais de dez',

                        ])
                    ->required(),
                Forms\Components\Select::make('pares_de_meia')
                    ->placeholder('Selecione a quantidade')
                    ->label('Quantidade de par de meias')
                    ->options([
                        '0'                     =>  '0',
                        '1'                     =>  '1',
                        '2'                     =>  '2',
                        '3'                     =>  '3',
                        '4'                     =>  '4',
                        '5'                     =>  '5',
                        '6'                     =>  '6',
                        '7'                     =>  '7',
                        '8'                     =>  '8',
                        '9'                     =>  '9',
                        '10'                    =>  '10',
                        'Mais de dez'           =>  'Mais de dez',

                        ])
                    ->required(),
                Forms\Components\Select::make('bones')
                    ->placeholder('Selecione a quantidade')
                    ->label('Quantidade de bones')
                    ->options([
                        '0'                     =>  '0',
                        '1'                     =>  '1',
                        '2'                     =>  '2',
                        '3'                     =>  '3',
                        '4'                     =>  '4',
                        '5'                     =>  '5',
                        '6'                     =>  '6',
                        '7'                     =>  '7',
                        '8'                     =>  '8',
                        '9'                     =>  '9',
                        '10'                    =>  '10',
                        'Mais de dez'           =>  'Mais de dez',

                        ])
                    ->required(),
                Forms\Components\Select::make('conjuntos_de_moleton')
                    ->placeholder('Selecione a quantidade')
                    ->label('Quantidade de calças')
                    ->options([
                        '0'                     =>  '0',
                        '1'                     =>  '1',
                        '2'                     =>  '2',
                        '3'                     =>  '3',
                        '4'                     =>  '4',
                        '5'                     =>  '5',
                        '6'                     =>  '6',
                        '7'                     =>  '7',
                        '8'                     =>  '8',
                        '9'                     =>  '9',
                        '10'                    =>  '10',
                        'Mais de dez'           =>  'Mais de dez',

                        ])
                    ->required(),
                Forms\Components\Select::make('camisas_camisetas')
                    ->placeholder('Selecione a quantidade')
                    ->label('Quantidade de par de meias')
                    ->options([
                        '0'                     =>  '0',
                        '1'                     =>  '1',
                        '2'                     =>  '2',
                        '3'                     =>  '3',
                        '4'                     =>  '4',
                        '5'                     =>  '5',
                        '6'                     =>  '6',
                        '7'                     =>  '7',
                        '8'                     =>  '8',
                        '9'                     =>  '9',
                        '10'                    =>  '10',
                        'Mais de dez'           =>  'Mais de dez',

                        ])
                    ->required(),
                Forms\Components\Select::make('pares_de_tenis')
                    ->placeholder('Selecione a quantidade')
                    ->label('Quantidade de par de meias')
                    ->options([
                        '0'                     =>  '0',
                        '1'                     =>  '1',
                        '2'                     =>  '2',
                        '3'                     =>  '3',
                        '4'                     =>  '4',
                        '5'                     =>  '5',
                        '6'                     =>  '6',
                        '7'                     =>  '7',
                        '8'                     =>  '8',
                        '9'                     =>  '9',
                        '10'                    =>  '10',
                        'Mais de dez'           =>  'Mais de dez',

                        ])
                    ->required(),
                Forms\Components\Select::make('toalhas')
                    ->placeholder('Selecione a quantidade')
                    ->label('Quantidade de par de meias')
                    ->options([
                        '0'                     =>  '0',
                        '1'                     =>  '1',
                        '2'                     =>  '2',
                        '3'                     =>  '3',
                        '4'                     =>  '4',
                        '5'                     =>  '5',
                        '6'                     =>  '6',
                        '7'                     =>  '7',
                        '8'                     =>  '8',
                        '9'                     =>  '9',
                        '10'                    =>  '10',
                        'Mais de dez'           =>  'Mais de dez',

                        ])
                    ->required(),
                Forms\Components\Select::make('lencois')
                    ->placeholder('Selecione a quantidade')
                    ->label('Quantidade de par de meias')
                    ->options([
                        '0'                     =>  '0',
                        '1'                     =>  '1',
                        '2'                     =>  '2',
                        '3'                     =>  '3',
                        '4'                     =>  '4',
                        '5'                     =>  '5',
                        '6'                     =>  '6',
                        '7'                     =>  '7',
                        '8'                     =>  '8',
                        '9'                     =>  '9',
                        '10'                    =>  '10',
                        'Mais de dez'           =>  'Mais de dez',

                        ])
                    ->required(),
                Forms\Components\Select::make('cobertores')
                    ->placeholder('Selecione a quantidade')
                    ->label('Quantidade de par de meias')
                    ->options([
                        '0'                     =>  '0',
                        '1'                     =>  '1',
                        '2'                     =>  '2',
                        '3'                     =>  '3',
                        '4'                     =>  '4',
                        '5'                     =>  '5',
                        '6'                     =>  '6',
                        '7'                     =>  '7',
                        '8'                     =>  '8',
                        '9'                     =>  '9',
                        '10'                    =>  '10',
                        'Mais de dez'           =>  'Mais de dez',

                        ])
                    ->required(),
                Forms\Components\Select::make('travesseiros')
                    ->placeholder('Selecione a quantidade')
                    ->label('Quantidade de par de meias')
                    ->options([
                        '0'                     =>  '0',
                        '1'                     =>  '1',
                        '2'                     =>  '2',
                        '3'                     =>  '3',
                        '4'                     =>  '4',
                        '5'                     =>  '5',
                        '6'                     =>  '6',
                        '7'                     =>  '7',
                        '8'                     =>  '8',
                        '9'                     =>  '9',
                        '10'                    =>  '10',
                        'Mais de dez'           =>  'Mais de dez',

                        ])
                    ->required(),
                Forms\Components\Select::make('fronhas')
                    ->placeholder('Selecione a quantidade')
                    ->label('Quantidade de par de meias')
                    ->options([
                        '0'                     =>  '0',
                        '1'                     =>  '1',
                        '2'                     =>  '2',
                        '3'                     =>  '3',
                        '4'                     =>  '4',
                        '5'                     =>  '5',
                        '6'                     =>  '6',
                        '7'                     =>  '7',
                        '8'                     =>  '8',
                        '9'                     =>  '9',
                        '10'                    =>  '10',
                        'Mais de dez'           =>  'Mais de dez',

                        ])
                    ->required(),
                Forms\Components\Select::make('cadernos')
                    ->placeholder('Selecione a quantidade')
                    ->label('Quantidade de par de meias')
                    ->options([
                        '0'                     =>  '0',
                        '1'                     =>  '1',
                        '2'                     =>  '2',
                        '3'                     =>  '3',
                        '4'                     =>  '4',
                        '5'                     =>  '5',
                        '6'                     =>  '6',
                        '7'                     =>  '7',
                        '8'                     =>  '8',
                        '9'                     =>  '9',
                        '10'                    =>  '10',
                        'Mais de dez'           =>  'Mais de dez',

                        ])
                    ->required(),
                Forms\Components\Select::make('canetas')
                    ->placeholder('Selecione a quantidade')
                    ->label('Quantidade de par de meias')
                    ->options([
                        '0'                     =>  '0',
                        '1'                     =>  '1',
                        '2'                     =>  '2',
                        '3'                     =>  '3',
                        '4'                     =>  '4',
                        '5'                     =>  '5',
                        '6'                     =>  '6',
                        '7'                     =>  '7',
                        '8'                     =>  '8',
                        '9'                     =>  '9',
                        '10'                    =>  '10',
                        'Mais de dez'           =>  'Mais de dez',

                        ])
                    ->required(),
                Forms\Components\Select::make('caixas_de_sabao_em_po')
                    ->placeholder('Selecione a quantidade')
                    ->label('Quantidade de par de meias')
                    ->options([
                        '0'                     =>  '0',
                        '1'                     =>  '1',
                        '2'                     =>  '2',
                        '3'                     =>  '3',
                        '4'                     =>  '4',
                        '5'                     =>  '5',
                        '6'                     =>  '6',
                        '7'                     =>  '7',
                        '8'                     =>  '8',
                        '9'                     =>  '9',
                        '10'                    =>  '10',
                        'Mais de dez'           =>  'Mais de dez',

                        ])
                    ->required(),
                Forms\Components\Select::make('pacote_de_sabao_em_barra')
                    ->placeholder('Selecione a quantidade')
                    ->label('Quantidade de par de meias')
                    ->options([
                        '0'                     =>  '0',
                        '1'                     =>  '1',
                        '2'                     =>  '2',
                        '3'                     =>  '3',
                        '4'                     =>  '4',
                        '5'                     =>  '5',
                        '6'                     =>  '6',
                        '7'                     =>  '7',
                        '8'                     =>  '8',
                        '9'                     =>  '9',
                        '10'                    =>  '10',
                        'Mais de dez'           =>  'Mais de dez',

                        ])
                    ->required(),
                Forms\Components\Select::make('amaciantes')
                ->placeholder('Selecione a quantidade')
                ->label('Quantidade de par de meias')
                ->options([
                    '0'                     =>  '0',
                    '1'                     =>  '1',
                    '2'                     =>  '2',
                    '3'                     =>  '3',
                    '4'                     =>  '4',
                    '5'                     =>  '5',
                    '6'                     =>  '6',
                    '7'                     =>  '7',
                    '8'                     =>  '8',
                    '9'                     =>  '9',
                    '10'                    =>  '10',
                    'Mais de dez'           =>  'Mais de dez',

                    ])
                ->required(),
                Forms\Components\Select::make('escova_de_roupa')
                ->placeholder('Selecione a quantidade')
                ->label('Quantidade de par de meias')
                ->options([
                    '0'                     =>  '0',
                    '1'                     =>  '1',
                    '2'                     =>  '2',
                    '3'                     =>  '3',
                    '4'                     =>  '4',
                    '5'                     =>  '5',
                    '6'                     =>  '6',
                    '7'                     =>  '7',
                    '8'                     =>  '8',
                    '9'                     =>  '9',
                    '10'                    =>  '10',
                    'Mais de dez'           =>  'Mais de dez',

                    ])
                ->required(),
                Forms\Components\Select::make('sabonetes')
                ->placeholder('Selecione a quantidade')
                ->label('Quantidade de par de meias')
                ->options([
                    '0'                     =>  '0',
                    '1'                     =>  '1',
                    '2'                     =>  '2',
                    '3'                     =>  '3',
                    '4'                     =>  '4',
                    '5'                     =>  '5',
                    '6'                     =>  '6',
                    '7'                     =>  '7',
                    '8'                     =>  '8',
                    '9'                     =>  '9',
                    '10'                    =>  '10',
                    'Mais de dez'           =>  'Mais de dez',

                    ])
                ->required(),
                Forms\Components\Select::make('desodorantes')
                ->placeholder('Selecione a quantidade')
                ->label('Quantidade de par de meias')
                ->options([
                    '0'                     =>  '0',
                    '1'                     =>  '1',
                    '2'                     =>  '2',
                    '3'                     =>  '3',
                    '4'                     =>  '4',
                    '5'                     =>  '5',
                    '6'                     =>  '6',
                    '7'                     =>  '7',
                    '8'                     =>  '8',
                    '9'                     =>  '9',
                    '10'                    =>  '10',
                    'Mais de dez'           =>  'Mais de dez',

                    ])
                ->required(),
                Forms\Components\Select::make('cremes_dental')
                ->placeholder('Selecione a quantidade')
                ->label('Quantidade de par de meias')
                ->options([
                    '0'                     =>  '0',
                    '1'                     =>  '1',
                    '2'                     =>  '2',
                    '3'                     =>  '3',
                    '4'                     =>  '4',
                    '5'                     =>  '5',
                    '6'                     =>  '6',
                    '7'                     =>  '7',
                    '8'                     =>  '8',
                    '9'                     =>  '9',
                    '10'                    =>  '10',
                    'Mais de dez'           =>  'Mais de dez',

                    ])
                ->required(),
                Forms\Components\Select::make('cremes_de_pele')
                ->placeholder('Selecione a quantidade')
                ->label('Quantidade de par de meias')
                ->options([
                    '0'                     =>  '0',
                    '1'                     =>  '1',
                    '2'                     =>  '2',
                    '3'                     =>  '3',
                    '4'                     =>  '4',
                    '5'                     =>  '5',
                    '6'                     =>  '6',
                    '7'                     =>  '7',
                    '8'                     =>  '8',
                    '9'                     =>  '9',
                    '10'                    =>  '10',
                    'Mais de dez'           =>  'Mais de dez',

                    ])
                ->required(),
                Forms\Components\Select::make('prestobarbas')
                    ->placeholder('Selecione a quantidade')
                    ->label('Quantidade de par de meias')
                    ->options([
                        '0'                     =>  '0',
                        '1'                     =>  '1',
                        '2'                     =>  '2',
                        '3'                     =>  '3',
                        '4'                     =>  '4',
                        '5'                     =>  '5',
                        '6'                     =>  '6',
                        '7'                     =>  '7',
                        '8'                     =>  '8',
                        '9'                     =>  '9',
                        '10'                    =>  '10',
                        'Mais de dez'           =>  'Mais de dez',

                        ])
                    ->required(),
                Forms\Components\Select::make('shampoo')
                ->placeholder('Selecione a quantidade')
                ->label('Quantidade de par de meias')
                ->options([
                    '0'                     =>  '0',
                    '1'                     =>  '1',
                    '2'                     =>  '2',
                    '3'                     =>  '3',
                    '4'                     =>  '4',
                    '5'                     =>  '5',
                    '6'                     =>  '6',
                    '7'                     =>  '7',
                    '8'                     =>  '8',
                    '9'                     =>  '9',
                    '10'                    =>  '10',
                    'Mais de dez'           =>  'Mais de dez',

                    ])
                ->required(),
                Forms\Components\Select::make('condicionadores')
                ->placeholder('Selecione a quantidade')
                ->label('Quantidade de par de meias')
                ->options([
                    '0'                     =>  '0',
                    '1'                     =>  '1',
                    '2'                     =>  '2',
                    '3'                     =>  '3',
                    '4'                     =>  '4',
                    '5'                     =>  '5',
                    '6'                     =>  '6',
                    '7'                     =>  '7',
                    '8'                     =>  '8',
                    '9'                     =>  '9',
                    '10'                    =>  '10',
                    'Mais de dez'           =>  'Mais de dez',

                    ])
                ->required(),
                Forms\Components\RichEditor::make('observacao_extras')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ])->columns(4)
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
