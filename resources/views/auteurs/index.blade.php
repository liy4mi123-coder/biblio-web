<!DOCTYPE html>
<html>
<head>
    <title>Liste des auteurs</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7f5;
            color: #1f2937;
            min-height: 100vh;
            padding: 40px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        /* En-tête */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        h1 {
            color: #14532d;
            font-size: 32px;
        }

        .btn-add {
            background: #15803d;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 7px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-add:hover {
            background: #166534;
        }

        /* Tableau */
        .table-container {
            background: white;
            padding: 20px;
            border-radius: 14px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            border-top: 5px solid #15803d;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #15803d;
            color: white;
            padding: 14px;
            text-align: left;
        }

        td {
            padding: 13px;
            border-bottom: 1px solid #e5e7eb;
        }

        tr:hover {
            background: #f0fdf4;
        }

        /* Statut actif */
        .actif {
            background: #dcfce7;
            color: #166534;
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: bold;
        }

        .inactif {
            background: #fee2e2;
            color: #991b1b;
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: bold;
        }

        /* Actions */
        .actions {
            display: flex;
            gap: 6px;
            align-items: center;
        }

        .btn {
            padding: 7px 11px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .btn-view {
            background: #dcfce7;
            color: #166534;
        }

        .btn-view:hover {
            background: #bbf7d0;
        }

        .btn-edit {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .btn-edit:hover {
            background: #bfdbfe;
        }

        .btn-delete {
            background: #fee2e2;
            color: #b91c1c;
        }

        .btn-delete:hover {
            background: #fecaca;
        }

        /* Responsive */
        @media (max-width: 800px) {
            body {
                padding: 20px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            h1 {
                font-size: 26px;
            }

            .actions {
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <h1>✍️ Liste des auteurs</h1>

        <a href="{{ route('auteurs.create') }}" class="btn-add">
            + Ajouter un auteur
        </a>

    </div>


    <div class="table-container">

        <table>

            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Date naissance</th>
                <th>Nationalité</th>
                <th>Actif</th>
                <th>Actions</th>
            </tr>

            @foreach($auteurs as $auteur)

                <tr>

                    <td>{{ $auteur->id }}</td>

                    <td>{{ $auteur->nom }}</td>

                    <td>{{ $auteur->prenom }}</td>

                    <td>{{ $auteur->email }}</td>

                    <td>{{ $auteur->date_naissance }}</td>

                    <td>{{ $auteur->nationalite }}</td>

                    <td>
                        @if($auteur->actif)
                            <span class="actif">Oui</span>
                        @else
                            <span class="inactif">Non</span>
                        @endif
                    </td>

                    <td>

                        <div class="actions">

                            <a href="{{ route('auteurs.show', $auteur) }}"
                               class="btn btn-view">
                                Voir
                            </a>

                            <a href="{{ route('auteurs.edit', $auteur) }}"
                               class="btn btn-edit">
                                Modifier
                            </a>

                            <form
                                action="{{ route('auteurs.destroy', $auteur) }}"
                                method="POST"
                                style="display:inline"
                            >

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-delete">
                                    Supprimer
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @endforeach

        </table>

    </div>

</div>

</body>
</html>