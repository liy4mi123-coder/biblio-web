<!DOCTYPE html>
<html>
<head>
    <title>Détail de l'auteur</title>

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
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .container {
            width: 100%;
            max-width: 650px;
        }

        .author-card {
            background: white;
            padding: 35px;
            border-radius: 14px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            border-top: 5px solid #15803d;
        }

        h1 {
            color: #14532d;
            font-size: 30px;
            margin-bottom: 25px;
        }

        .info {
            border-top: 1px solid #e5e7eb;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 15px 5px;
            border-bottom: 1px solid #e5e7eb;
        }

        .label {
            font-weight: bold;
            color: #374151;
        }

        .value {
            color: #166534;
        }

        h2 {
            color: #14532d;
            font-size: 22px;
            margin-top: 30px;
            margin-bottom: 15px;
        }

        .books {
            list-style: none;
            padding: 0;
        }

        .books li {
            background: #f0fdf4;
            border-left: 4px solid #15803d;
            padding: 12px 15px;
            margin-bottom: 8px;
            border-radius: 6px;
            color: #166534;
            font-weight: 500;
        }

        .no-books {
            color: #6b7280;
            font-style: italic;
            padding: 10px 0;
        }

        .buttons {
            margin-top: 30px;
        }

        .btn-back {
            display: inline-block;
            padding: 12px 20px;
            background: #15803d;
            color: white;
            text-decoration: none;
            border-radius: 7px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-back:hover {
            background: #166534;
        }

        @media (max-width: 600px) {
            body {
                padding: 15px;
            }

            .author-card {
                padding: 25px;
            }

            .info-row {
                flex-direction: column;
                gap: 5px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="author-card">

        <h1>✍️ {{ $auteur->prenom }} {{ $auteur->nom }}</h1>


        <div class="info">

            <div class="info-row">
                <span class="label">Email :</span>
                <span class="value">{{ $auteur->email }}</span>
            </div>

            <div class="info-row">
                <span class="label">Nationalité :</span>
                <span class="value">{{ $auteur->nationalite }}</span>
            </div>

        </div>


        <h2>📚 Ses livres</h2>

        @if($auteur->livres->count() > 0)

            <ul class="books">

                @foreach($auteur->livres as $livre)

                    <li>
                        {{ $livre->titre }}
                    </li>

                @endforeach

            </ul>

        @else

            <p class="no-books">
                Aucun livre associé à cet auteur.
            </p>

        @endif


        <div class="buttons">

            <a href="{{ route('auteurs.index') }}" class="btn-back">
                ← Retour aux auteurs
            </a>

        </div>

    </div>

</div>

</body>
</html>