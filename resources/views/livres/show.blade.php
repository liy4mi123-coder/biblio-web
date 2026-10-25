<!DOCTYPE html>
<html>
<head>
    <title>Détail du livre</title>

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

        .book-card {
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

        .book-info {
            border-top: 1px solid #e5e7eb;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 5px;
            border-bottom: 1px solid #e5e7eb;
        }

        .label {
            font-weight: bold;
            color: #374151;
        }

        .value {
            color: #166534;
            font-weight: 500;
            text-align: right;
        }

        .price {
            font-weight: bold;
            color: #15803d;
        }

        .stock {
            background: #dcfce7;
            color: #166534;
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: bold;
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
        }

        .btn-back:hover {
            background: #166534;
        }

        @media (max-width: 600px) {
            body {
                padding: 15px;
            }

            .book-card {
                padding: 25px;
            }

            .info-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 6px;
            }

            .value {
                text-align: left;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="book-card">

        <h1>📚 {{ $livre->titre }}</h1>

        <div class="book-info">

            <div class="info-row">
                <span class="label">Auteur :</span>

                <span class="value">
                    {{ $livre->auteur->prenom }}
                    {{ $livre->auteur->nom }}
                </span>
            </div>

            <div class="info-row">
                <span class="label">ISBN :</span>

                <span class="value">
                    {{ $livre->isbn }}
                </span>
            </div>

            <div class="info-row">
                <span class="label">Prix :</span>

                <span class="value price">
                    {{ $livre->prix }} DH
                </span>
            </div>

            <div class="info-row">
                <span class="label">Stock :</span>

                <span class="value stock">
                    {{ $livre->stock }}
                </span>
            </div>

        </div>

        <div class="buttons">

            <a href="{{ route('livres.index') }}" class="btn-back">
                ← Retour aux livres
            </a>

        </div>

    </div>

</div>

</body>
</html>