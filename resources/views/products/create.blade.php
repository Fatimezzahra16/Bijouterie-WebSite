<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nouveau Produit - Luxe Jewelry</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --gold: #d4af37;
            --dark: #2c3e50;
            --light-bg: #f9f7f5;
            --error: #c0392b;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--light-bg);
            color: #333;
            padding: 20px;
            margin: 0;
            min-height: 100vh;
        }
        
        .container {
            max-width: 600px;
            margin: 40px auto;
            position: relative;
        }
        
        .back-btn {
            display: inline-flex;
            align-items: center;
            color: var(--dark);
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 20px;
            transition: color 0.3s;
        }
        
        .back-btn:hover {
            color: var(--gold);
        }
        
        .back-btn i {
            margin-right: 8px;
        }
        
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.05);
            border: 1px solid rgba(0,0,0,0.05);
        }
        
        h1 {
            color: var(--dark);
            font-family: 'Playfair Display', serif;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            font-size: 28px;
            position: relative;
            padding-bottom: 15px;
        }
        
        h1:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 2px;
            background: var(--gold);
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark);
            font-size: 15px;
        }
        
        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 15px;
            transition: all 0.3s;
            font-family: 'Montserrat', sans-serif;
        }
        
        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus,
        select:focus {
            border-color: var(--gold);
            outline: none;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
        }
        
        textarea {
            height: 120px;
            resize: vertical;
            line-height: 1.6;
        }
        
        .submit-btn {
            background-color: var(--dark);
            color: white;
            padding: 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            width: 100%;
            transition: all 0.3s;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .submit-btn i {
            margin-right: 10px;
        }
        
        .submit-btn:hover {
            background-color: var(--gold);
            transform: translateY(-2px);
        }
        
        .error-messages {
            color: var(--error);
            background-color: #fdecea;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid var(--error);
            font-size: 14px;
        }
        
        .error-messages ul {
            margin: 0;
            padding-left: 20px;
            line-height: 1.6;
        }
        
        .error-messages li {
            margin-bottom: 5px;
        }
        
        .home-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: white;
            color: var(--dark);
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .home-btn:hover {
            border-color: var(--gold);
            color: var(--gold);
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('product.index') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i> Retour aux produits
        </a>
        
        <div class="form-container">
            <h1>Ajouter un nouveau produit</h1>
            
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                
                <div class="form-group">
                    <label for="nom">Nom du produit:</label>
                    <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required placeholder="Ex: Bague en or 18 carats">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" placeholder="Décrivez le produit en détail...">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="prix">Prix (MAD):</label>
                    <input type="number" id="prix" name="prix" min="0" step="0.01" value="{{ old('prix') }}" required placeholder="Ex: 1999.99">
                </div>
                
                <div class="form-group">
                    <label for="stock">Quantité en stock:</label>
                    <input type="number" id="stock" name="stock" min="1" value="{{ old('stock') }}" required placeholder="Ex: 10">
                </div>

                <div class="form-group">
                    <label for="collection_id">Collection associée:</label>
                    <select name="collection_id" id="collection_id" required>
                        <option value="">-- Sélectionnez une collection --</option>
                        @foreach($collections as $collection)
                            <option value="{{ $collection->id }}" {{ old('collection_id') == $collection->id ? 'selected' : '' }}>
                                {{ $collection->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="submit-btn">
                    <i class="fas fa-plus-circle"></i> Ajouter le produit
                </button>
                
                @if($errors->any())
                <div class="error-messages">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </form>
        </div>
    </div>
</body>
</html>