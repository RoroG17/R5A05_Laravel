<!DOCTYPE html>
<html>
<head>
    <title>Nouvelle Note</title>
</head>
<body>
    <h1>Bonjour {{ $nom }} {{ $prenom }},</h1>
    <p>Une nouvelle note a été saisie pour vous, dans le module {{ $module }} :</p>
    <ul>
        <li>{{ $date }} -> {{ $titre }} : {{ $note }}</li>
    </ul>
</body>
</html>
