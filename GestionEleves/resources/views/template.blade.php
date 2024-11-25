<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Élèves</title>
    <link rel="stylesheet" href='css/app.css'>
</head>
<body>

    <!-- En-tête -->
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('eleves.index') }}">Eleves</a></li>
                <li><a href="{{ route('modules.index') }}">Modules</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>
