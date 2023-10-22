<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PsicologaResource\Pages;
use App\Filament\Resources\PsicologaResource\RelationManagers;
use App\Models\Psicologa;
use App\Models\Paciente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PsicologaResource extends Resource
{
    protected static ?string $model = Psicologa::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $pluralModelLabel = 'Psicologia';

    protected static ?string $navigationGroup = 'Saúde';

    protected static ?string $slug = 'psicologia';

    protected static ?string $recordTitleAttribute = 'paciente.primeiro_nome';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }





    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Nome do profissional')
                    ->placeholder('Selecione o profissional')
                    ->required()
                    ->relationship('user' , 'name'),
                Forms\Components\Select::make('paciente_id')
                    ->label('Nome do paciente')
                    ->placeholder('selecione o paciente')
                    ->required()
                    ->relationship('paciente' , 'primeiro_nome'),
                Forms\Components\DateTimePicker::make('hora_do_atendimento')
                    ->required(),
                Forms\Components\RichEditor::make('historico_de_evolucao')
                    ->label('Histórico de Evolução')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')

                ->label('Profissional')
                    ->sortable(),
                Tables\Columns\TextColumn::make('paciente.primeiro_nome')
                    ->sortable(),
                Tables\Columns\TextColumn::make('hora_do_atendimento')
                    ->dateTime('d/m/Y h:i:s')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y h:i:s')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime('d/m/Y h:i:s')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                ->label('Visualizar'),
                Tables\Actions\EditAction::make()
                ->label('Editar'),
                Tables\Actions\DeleteAction::make()
                ->label('Deletar'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePsicologas::route('/'),
        ];
    }
}
