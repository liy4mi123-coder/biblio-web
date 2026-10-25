<!DOCTYPE html>
<html>
<head>
    <title>Modifier un auteur</title>

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

        .form-card {
            background: white;
            padding: 35px;
            border-radius: 14px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            border-top: 5px solid #15803d;
        }

        h1 {
            color: #14532d;
            font-size: 30px;
            margin-bottom: 8px;
        }

        .description {
            color: #6b7280;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #374151;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            font-size: 15px;
            background: #f9fafb;
            outline: none;
            transition: 0.3s;
        }

        input:focus {
            border-color: #16a34a;
            background: white;
            box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.12);
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 20px;
            border-radius: 7px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
            border: none;
            font-size: 15px;
        }

        .btn-update {
            background: #15803d;
            color: white;
            flex: 1;
        }

        .btn-update:hover {
            background: #166534;
        }

        .btn-back {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-back:hover {
            background: #d1d5db;
        }

        @media (max-width: 600px) {
            body {
                padding: 15px;
            }

            .form-card {
                padding: 25px;
            }

            .buttons {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="form-card">

        <h1>✏️ Modifier l'auteur</h1>

        <p class="description">
            Modifiez les informations de l'auteur puis validez les changements.
        </p>

        <form action="{{ route('auteurs.update', $auteur) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nom :</label>

                <input type="text"
                       name="nom"
                       value="{{ $auteur->nom }}">
            </div>


            <div class="form-group">
                <label>Prénom :</label>

                <input type="text"
                       name="prenom"
                       value="{{ $auteur->prenom }}">
            </div>


            <div class="form-group">
                <label>Email :</label>

                <input type="email"
                       name="email"
                       value="{{ $auteur->email }}">
            </div>


            <div class="form-group">
                <label>Date de naissance :</label>

                <input type="date"
                       name="date_naissance"
                       value="{{ $auteur->date_naissance?->format('Y-m-d') }}">
            </div>


            <div class="form-group">
                <label>Nationalité :</label>

                <input type="text"
                       name="nationalite"
                       value="{{ $auteur->nationalite }}">
            </div>


            <div class="buttons">

                <button type="submit" class="btn btn-update">
                    ✓ Modifier l'auteur
                </button>

                <a href="{{ route('auteurs.index') }}" class="btn btn-back">
                    Retour
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>