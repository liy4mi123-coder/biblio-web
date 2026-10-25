<!DOCTYPE html>

<html>

<head>
    <title>Liste des livres</title>

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
        padding: 40px;
    }

    .container {
        max-width: 1400px;
        margin: auto;
    }

    /* ===== HEADER ===== */

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .header h1 {
        color: #14532d;
        font-size: 32px;
    }

    .header p {
        color: #6b7280;
        margin-top: 6px;
    }

    .add-btn {
        background: #15803d;
        color: white;
        padding: 12px 20px;
        text-decoration: none;
        border-radius: 8px;
        font-weight: bold;
        transition: 0.3s;
    }

    .add-btn:hover {
        background: #166534;
        transform: translateY(-2px);
    }

    /* ===== STATISTICS ===== */

    .stats-title {
        color: #14532d;
        margin-bottom: 15px;
    }

    .stats {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 18px;
        margin-bottom: 35px;
    }

    .stat-card {
        background: white;
        padding: 22px;
        border-radius: 12px;
        border-left: 4px solid #16a34a;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);
        transition: 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(21, 128, 61, 0.15);
    }

    .stat-card h3 {
        font-size: 14px;
        color: #6b7280;
        margin-bottom: 10px;
    }

    .stat-card p {
        font-size: 24px;
        font-weight: bold;
        color: #166534;
    }

    /* ===== TABLE ===== */

    .table-container {
        background: white;
        padding: 20px;
        border-radius: 14px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        overflow-x: auto;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th {
        background: #14532d;
        color: white;
        padding: 14px;
        text-align: left;
        font-size: 14px;
    }

    td {
        padding: 13px 14px;
        border-bottom: 1px solid #e5e7eb;
        color: #374151;
    }

    tr:hover {
        background: #f0fdf4;
    }

    /* ===== BUTTONS ===== */

    .action {
        display: inline-block;
        padding: 7px 11px;
        margin: 2px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 13px;
        font-weight: bold;
    }

    .voir {
        background: #dcfce7;
        color: #166534;
    }

    .voir:hover {
        background: #bbf7d0;
    }

    .modifier {
        background: #fef3c7;
        color: #92400e;
    }

    .modifier:hover {
        background: #fde68a;
    }

    .supprimer {
        background: #fee2e2;
        color: #b91c1c;
        border: none;
        cursor: pointer;
        padding: 7px 11px;
        border-radius: 6px;
        font-weight: bold;
    }

    .supprimer:hover {
        background: #fecaca;
    }

    /* ===== RESPONSIVE ===== */

    @media (max-width: 1000px) {
        .stats {
            grid-template-columns: repeat(2, 1fr);
        }

        body {
            padding: 20px;
        }

        .header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }
    }
</style>

</head>

<body>

<div class="container">

<div class="header">

    <div>
        <h1>📚 Liste des livres</h1>
        <p>Gestion de votre bibliothèque</p>
    </div>

    <a href="{{ route('livres.create') }}" class="add-btn">
        + Ajouter un livre
    </a>

</div>


<h2 class="stats-title">Statistiques</h2>

<div class="stats">

    <div class="stat-card">
        <h3>Nombre de livres</h3>
        <p>{{ $nombreLivres }}</p>
    </div>

    <div class="stat-card">
        <h3>Prix moyen</h3>
        <p>{{ $prixMoyen }} DH</p>
    </div>

    <div class="stat-card">
        <h3>Stock total</h3>
        <p>{{ $stockTotal }}</p>
    </div>

    <div class="stat-card">
        <h3>Prix maximum</h3>
        <p>{{ $prixMax }} DH</p>
    </div>

    <div class="stat-card">
        <h3>Prix minimum</h3>
        <p>{{ $prixMin }} DH</p>
    </div>

</div>


<div class="table-container">

    <table>

        <tr>

            <th>ID</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>ISBN</th>
            <th>Prix</th>
            <th>Stock</th>
            <th>Date publication</th>
            <th>Disponible</th>
            <th>Actions</th>

        </tr>

        @foreach($livres as $livre)

            <tr>

                <td>{{ $livre->id }}</td>

                <td>{{ $livre->titre }}</td>

                <td>
                    @if($livre->auteur)
                        {{ $livre->auteur->prenom }}
                        {{ $livre->auteur->nom }}
                    @else
                        Aucun auteur
                    @endif
                </td>

                <td>{{ $livre->isbn }}</td>

                <td>{{ $livre->prix }} DH</td>

                <td>{{ $livre->stock }}</td>

                <td>{{ $livre->date_publication }}</td>

                <td>
                    {{ $livre->disponible ? 'Oui' : 'Non' }}
                </td>

                <td>

                    <a href="{{ route('livres.show', $livre) }}"
                       class="action voir">
                        Voir
                    </a>

                    <a href="{{ route('livres.edit', $livre) }}"
                       class="action modifier">
                        Modifier
                    </a>

                    <form
                        action="{{ route('livres.destroy', $livre) }}"
                        method="POST"
                        style="display:inline"
                    >

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="supprimer">
                            Supprimer
                        </button>

                    </form>

                </td>

            </tr>

        @endforeach

    </table>

</div>

</div>

</body>

</html>
