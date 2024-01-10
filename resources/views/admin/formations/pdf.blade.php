<!-- resources/views/admin/formations/pdf.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Formation PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>{{ $formation->title }}</h1>

    <h2>Utilisateurs inscrits à cette formation</h2>
    <h3>Titre de la formation : <b>{{ $formation->intitule }}</b></h3>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach($utilisateurs as $user)
                <tr>
                    <td>{{ $user->nom }}</td>
                    <td>{{ $user->prenom }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->telephone }}</td>
                    <td>{{ $user->statut }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Ajoutez ici le reste de votre contenu HTML -->
</body>
</html>