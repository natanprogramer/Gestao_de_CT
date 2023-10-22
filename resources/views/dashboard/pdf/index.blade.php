<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>


    <table class="table table-bordered">
        <tr>
            <th>Nome do Paciente</th>
            <th>Data do acolhimento</th>
            <th>Telefone</th>
        </tr>
        @foreach($pacientes as $paciente)
        <tr>
            <td>{{ $paciente->primeiro_nome }} {{ $paciente->sobrenome }}</td>
            <td>{{ $paciente->data_do_acolhimento }}</td>
            <td>{{ $paciente->telefone_do_responsavel }}</td>

        @endforeach
    </table>

</body>
</html>
