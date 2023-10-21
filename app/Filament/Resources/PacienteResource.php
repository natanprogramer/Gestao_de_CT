<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PacienteResource\Pages;
use App\Filament\Resources\PacienteResource\RelationManagers;
use App\Models\Paciente;
use App\Models\User;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Label;

class PacienteResource extends Resource
{
    protected static ?string $model = Paciente::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    protected static ?string $navigationGroup = 'Cadastro';

    protected static ?string $slug = 'pacientes';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Toggle::make('status')
                ->required(),
                Forms\Components\Select::make('user_id')
                ->label('Responsavel Pela Triagem')
                ->relationship('user' , 'name')
                ->required(),

                Forms\Components\FileUpload::make('avatar_paciente')
                    ->label('Avatar')
                    ->disk('public')
                    ->directory('pacientes')
                    ->image()
                    ->imageEditor()
                    ->columnSpanFull()
                    ->previewable(true),
                Forms\Components\TextInput::make('primeiro_nome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('sobrenome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('data_do_acolhimento')
                    ->required(),
                Forms\Components\TextInput::make('numero_de_telefone')
                    ->mask('(99) 9-9999-9999')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('data_de_nascimento')
                    ->required(),
                Forms\Components\Select::make('genero')
                    ->label('Gênero')
                    ->placeholder('Escolha uma opção')
                    ->options([
                        'Homem'     =>  'Homem',
                        'Mulher'    =>  'Mulher',
                        'Outros'    =>  'Outros',
                    ])
                    ->label('Gênero')
                    ->required(),
                Forms\Components\TextInput::make('endereco')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cidade')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pais')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('estado')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cpf')
                    ->label('CPF')
                    ->mask('999.999.999-99')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('estado_civil')
                    ->label('Estado civil atual')
                    ->placeholder('Escolha uma opção')
                    ->options([
                        'Solteiro'          =>  'Solteiro',
                        'Casado'            =>  'Casado',
                        'Divorciado'        =>  'Divorciado',
                        'Viúvo'             =>  'Viúvo',
                        'União Estável'     =>  'União Estável',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('conjuge')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nome_da_mae')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nome_do_pai')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('responsavel_pelo_acolhimento')
                    ->label('Responsável pelo Acolhido')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('telefone_do_responsavel')
                ->mask('(99) 9-9999-9999')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('encaminhado_por')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('motivacao')
                    ->label('Você está motivado?')
                    ->placeholder('Escolha uma opção')
                    ->options([
                        'Sim'   =>  'Sim',
                        'Não'   =>  'Não',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('porque_motivacao')
                    ->label('Acolhido, explique mais sobre o porquê do estar ou não motivado')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('observacao_extras')
                    ->placeholder('Exemplo de observações extras: O paciente não tem os documentos pessoais..')
                    ->label('Observações Extras')
                    ->toolbarButtons([
                    'attachFiles',
                    'blockquote',
                    'bold',
                    'bulletList',
                    'codeBlock',
                    'h2',
                    'h3',
                    'italic',
                    'link',
                    'orderedList',
                    'redo',
                    'strike',
                    'underline',
                    'undo',
                ])
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\CheckboxList::make('saude')
                    ->options([
                        'Pressão Alta'                                  =>  'Pressão Alta',
                        'Diabetes'                                      =>  'Diabetes',
                        'Doença Cardíaca'                               =>  'Doença Cardíaca',
                        'Derrame/Isquemia (AVC)'                        =>  'Derrame/Isquemia (AVC)',
                        'Epilepsia ou convulsões'                       =>  'Epilepsia ou convulsões',
                        'Câncer'                                        =>  'Câncer',
                        'Hepatite A'                                    =>  'Hepatite A',
                        'Hepatite B'                                    =>  'Hepatite B',
                        'Hepatite C'                                    =>  'Hepatite C',
                        'HIV/AIDS'                                      =>  'HIV/AIDS',
                        'Sífilis'                                       =>  'Sífilis',
                        'Doença renal crônica'                          =>  'Doença renal crônica',
                        'Problema respiratório crônico'                 =>  'Problema respiratório crônico',
                        'Cirrose ou outra doença crônica do fígado'     =>  'Cirrose ou outra doença crônica do fígado',
                        'Tuberculose'                                   =>  'Tuberculose',
                        'Outros problemas de saúde'                     =>  'Outros problemas de saúde',
                        'Nenhuma opção'                                 =>  'Nenhuma opção',

                    ])

                    ->searchable()
                    ->columns(5)
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\CheckboxList::make('diagnosticado')
                    ->options([
                        'Ansiedade'                                     =>      'Ansiedade',
                        'Depressão'                                     =>      'Depressão',
                        'Pânico'                                        =>      'Pânico',
                        'Esquizofrenia'                                 =>      'Esquizofrenia',
                        'Alucinações (sem álcool/drogas)'               =>      'Alucinações (sem álcool/drogas)',
                        'Ideações suicidas'                             =>      'Ideações suicidas',
                        'Tentativas de suicídio'                        =>      'Tentativas de suicídio',
                        'Comportamento violento'                        =>      'Comportamento violento',
                        'Bulimia nervosa'                               =>      'Bulimia nervosa',
                        'Transtorno Bipolar'                            =>      'Transtorno Bipolar',
                        'Insônia'                                       =>      'Insônia',
                        'Automutilação'                                 =>      'Automutilação',
                        'Transtorno Obsessivo Compulsivo (TOC)'         =>      'Transtorno Obsessivo Compulsivo (TOC)',
                        'Déficit de atenção e hiperatividade (TDAH)'    =>      'Déficit de atenção e hiperatividade (TDAH)',
                        'Nenhuma opção'                                 =>      'Nenhuma opção',
                    ])
                    ->required()
                    ->columns(5)
                    ->searchable()
                    ->columnSpanFull(),
                Forms\Components\Select::make('desconforto_fisico')
                    ->placeholder('Escolha uma opção')
                    ->options([
                        'Sim'   =>  'Sim',
                        'Não'   =>  'Não',
                    ])
                    ->label('Sente algum desconforto físico?')
                    ->required(),
                Forms\Components\Textarea::make('qual_desconforto')
                    ->placeholder('Descreva o desconforto do paciente')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Select::make('restricao_alimentar')
                ->placeholder('Escolha uma opção')
                    ->options([
                        'Sim'   =>  'Sim',
                        'Não'   =>  'Não',
                    ])
                    ->label('O paciente tem alguma restrição alimentar?')
                    ->required(),
                Forms\Components\Textarea::make('qual_restricao_alimentar')
                    ->placeholder('Descreva qual restrição alimentar')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Select::make('necessidade_especial')
                    ->label('O paciente tem alguma necessidade especial?')
                    ->placeholder('Escolha uma opção')
                    ->options([
                        'Nenhuma'   =>  'Nenhuma',
                        'De ordem sensorial (cegos, surdos, mudos, etc.)'   =>  'De ordem sensorial (cegos, surdos, mudos, etc.)',
                        'De ordem física (paraplegia ou membro amputado,etc.)'  =>  'De ordem física (paraplegia ou membro amputado,etc.)',
                        'De ordem neurológica (paralisia cerebral, etc.)'   =>  'De ordem neurológica (paralisia cerebral, etc.)',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('qual_acompanhamento_de_saude')
                    ->label('O paciente faz algum acompanhamento de saúde?')
                    ->placeholder('Descreva qual acomplanhamento e quanto tempo ele faz esse acompanhamento')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Select::make('hospitalizado')
                    ->label('O paciente já foi hospitalizado?')
                    ->placeholder('Escolha uma opção')
                    ->options([
                        'Sim'   =>  'Sim',
                        'Não'   =>  'Não',
                    ])
                    ->label('O paciente já foi hospitalizado?')
                    ->required(),
                Forms\Components\Select::make('quant_hospitalizacao')
                    ->label('Quantas hospitalização?')
                    ->placeholder('Selecione uma opção')
                    ->options([
                        '0'             =>  '0',
                        '1'             =>  '1',
                        '2'             =>  '2',
                        '3'             =>  '3',
                        '4'             =>  '4',
                        '5'             =>  '5',
                        '6'             =>  '6',
                        '7'             =>  '7',
                        '8'             =>  '8',
                        '9'             =>  '9',
                        '10'            =>  '10',
                        'Mais de dez'   =>  'Mais de dez',
                    ])
                    ->required(),
                Forms\Components\Select::make('algum_medicamento')
                    ->label('Toma algum medicamento?')
                    ->placeholder('Escolha uma opção')
                    ->options([
                        'Sim'   =>  'Sim',
                        'Não'   =>  'Não',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('qual_motivo_medicamento')
                    ->label('Qual medicamento o paciente usa atualmente?')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('avaliacao_do_caso')
                ->placeholder('Avalie o caso do paciente caso nescesssário.')
                ->toolbarButtons([
                    'attachFiles',
                    'blockquote',
                    'bold',
                    'bulletList',
                    'codeBlock',
                    'h2',
                    'h3',
                    'italic',
                    'link',
                    'orderedList',
                    'redo',
                    'strike',
                    'underline',
                    'undo',
                ])
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table

            ->columns([

                Tables\Columns\TextColumn::make('user.name')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\IconColumn::make('status')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->boolean(),
                Tables\Columns\ImageColumn::make('avatar_paciente')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->label('Avatar'),
                Tables\Columns\TextColumn::make('primeiro_nome')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('sobrenome')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('data_do_acolhimento')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('numero_de_telefone')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('nome_da_mae')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('nome_do_pai')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('responsavel_pelo_acolhimento')
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->dateTime()
                    ->label('Criado em')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->date('d/m/Y ')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Atualizado em')
            ])

            ->filters([
                Filter::make('Pacientes Ativos')->query(
                    function(Builder $query) : Builder {
                        return $query->where('status' , true );
                    }
                ),
                Filter::make('Pacientes Inativos')->query(
                    function(Builder $query) : Builder {
                        return $query->where('status' , false );
                    }
                ),

                SelectFilter::make('user_id')
                ->label('Usuário Cadastro')
                ->relationship('user' , 'name')
                ->multiple()
                ->preload()
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                ->label('Visualisar'),
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
            'index' => Pages\ListPacientes::route('/'),
            'create' => Pages\CreatePaciente::route('/create'),
            'view' => Pages\ViewPaciente::route('/{record}'),
            'edit' => Pages\EditPaciente::route('/{record}/edit'),
        ];
    }




}



