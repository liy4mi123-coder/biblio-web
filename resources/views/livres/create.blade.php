<!DOCTYPE html>

<html>

<head>
    <title>Ajouter un livre</title>

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
        margin-bottom: 8px;
        font-size: 30px;
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

    input,
    select {
        width: 100%;
        padding: 12px;
        border: 1px solid #d1d5db;
        border-radius: 7px;
        font-size: 15px;
        background: #f9fafb;
        outline: none;
        transition: 0.3s;
    }

    input:focus,
    select:focus {
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

    .btn-add {
        background: #15803d;
        color: white;
        flex: 1;
    }

    .btn-add:hover {
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

    <h1>📚 Ajouter un livre</h1>

    <p class="description">
        Remplissez les informations du nouveau livre.
    </p>

    <form action="{{ route('livres.store') }}" method="POST">

        @csrf

        <div class="form-group">
            <label>Auteur :</label>

            <select name="auteur_id">

                @foreach($auteurs as $auteur)

                    <option value="{{ $auteur->id }}">
                        {{ $auteur->prenom }} {{ $auteur->nom }}
                    </option>

                @endforeach

            </select>
        </div>


        <div class="form-group">
            <label>Titre :</label>
            <input type="text" name="titre">
        </div>


        <div class="form-group">
            <label>ISBN :</label>
            <input type="text" name="isbn">
        </div>


        <div class="form-group">
            <label>Prix :</label>
            <input type="number" step="0.01" name="prix">
        </div>


        <div class="form-group">
            <label>Stock :</label>
            <input type="number" name="stock">
        </div>


        <div class="form-group">
            <label>Date de publication :</label>
            <input type="date" name="date_publication">
        </div>


        <div class="buttons">

            <button type="submit" class="btn btn-add">
                Ajouter le livre
            </button>

            <a href="{{ route('livres.index') }}" class="btn btn-back">
                Retour
            </a>

        </div>

    </form>

</div>

</div>

</body>

</html>
