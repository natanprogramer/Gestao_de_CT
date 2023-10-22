<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FarmaciaResource\Pages;
use App\Filament\Resources\FarmaciaResource\RelationManagers;
use App\Models\Paciente;
use App\Models\Farmacia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FarmaciaResource extends Resource
{
    protected static ?string $model = Farmacia::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';

    protected static ?string $pluralModelLabel = 'Farmácia';

    protected static ?string $navigationGroup = 'Saúde';

    protected static ?string $slug = 'farmacia';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }



    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('paciente_id')
                    ->label('Nome do paciente')
                    ->placeholder('selecione o paciente')
                    ->preload()
                    ->searchable()
                    ->required()
                    ->relationship('paciente' , 'primeiro_nome'),
                Forms\Components\Select::make('user_id')
                    ->placeholder('Selecione o profissional')
                    ->preload()
                    ->label('Nome do Profissional')
                    ->searchable()
                    ->relationship('user'   ,   'name')
                    ->required(),
                Forms\Components\TextInput::make('nome_da_medicacao')
                    ->label('Nome da medicação')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('posologia')
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\CheckboxList::make('paciente_possui_alergia')
                    ->options([
                        'Sim'   =>  'Sim',
                        'Não'   =>  'Não',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('qual_alergia')
                    ->label('Se o paciente possui alergia, diga-nos quais são')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\FileUpload::make('upload_receita_medica')
                    ->disk('public')
                    ->directory('receitas_medicas')
                    ->downloadable()
                    ->previewable(true)
                    ->acceptedFileTypes(['application/pdf'])
                    ->preserveFilenames(),
                Forms\Components\Select::make('vacina_covid_19')
                    ->options([
                        'Vacina Pfizer'         => 'Vacina Pfizer',
                        'Vacina Moderna'        => 'Vacina Moderna',
                        'Vacina AstraZeneca'    => 'Vacina AstraZeneca',
                        'Vacina Janssen'        => 'Vacina Janssen',
                        'Vacina Sinopharm'      => 'Vacina Sinopharm',
                        'Vacina Sinovac'        => 'Vacina Sinovac',
                        'Vacina Bharat'         => 'Vacina Bharat',
                        'Vacina Novavax'        => 'Vacina Novavax',
                        'Vacina Cansino'        => 'Vacina Cansino',
                        'Vacina Valneva'        => 'Vacina Valneva',
                        'CoronaVac'             => 'CoronaVac',
                    ])
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->placeholder('Selecione as vacinas')
                    ->required(),
                Forms\Components\Select::make('quantas_doses')
                    ->placeholder('Selecione a quantidade de doses')
                    ->label('Quantidade de doses')
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
                Forms\Components\RichEditor::make('observacao')
                    ->label('Observações')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('paciente.avatar_paciente')
                    ->label('Avatar')
                    ->sortable(),
                Tables\Columns\TextColumn::make('paciente.primeiro_nome')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Profissional')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nome_da_medicacao')
                    ->searchable(),
                Tables\Columns\TextColumn::make('paciente_possui_alergia')
                    ->searchable(),
                Tables\Columns\TextColumn::make('upload_receita_medica')
                    ->searchable(),
                Tables\Columns\TextColumn::make('vacina_covid_19')
                    ->searchable(),
                Tables\Columns\TextColumn::make('quantas_doses')
                    ->searchable(),
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
            'index' => Pages\ListFarmacias::route('/'),
            'create' => Pages\CreateFarmacia::route('/create'),
            'view' => Pages\ViewFarmacia::route('/{record}'),
            'edit' => Pages\EditFarmacia::route('/{record}/edit'),
        ];
    }
}
