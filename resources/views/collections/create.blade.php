<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nouvelle Collection</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --gold: #d4af37;
            --dark: #2c3e50;
            --light-bg: #f9f7f5;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--light-bg);
            color: #333;
            padding: 0;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        .back-btn {
            position: absolute;
            top: 30px;
            left: 30px;
            color: var(--dark);
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
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
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.05);
            width: 100%;
            max-width: 600px;
            position: relative;
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
            margin-bottom: 10px;
            font-weight: 500;
            color: var(--dark);
            font-size: 15px;
        }
        
        input[type="text"],
        textarea {
            width: 100%;
            padding: 14px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 15px;
            transition: all 0.3s;
            font-family: 'Montserrat', sans-serif;
        }
        
        input[type="text"]:focus,
        textarea:focus {
            border-color: var(--gold);
            outline: none;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
        }
        
        textarea {
            height: 140px;
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
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 10px;
        }
        
        .submit-btn:hover {
            background-color: var(--gold);
            transform: translateY(-2px);
        }
        
        .error-messages {
            color: #c0392b;
            background-color: #fdecea;
            padding: 18px;
            border-radius: 8px;
            margin-top: 25px;
            border-left: 4px solid #c0392b;
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
    </style>
</head>
<body>
    <a href="{{ url()->previous() }}" class="back-btn">
        <i class="fas fa-arrow-left"></i> Retour
    </a>
    
    <div class="form-container">
        <h1>Créer une nouvelle collection</h1>
        <form method="post" action="{{ route('collection.store') }}" enctype="multipart/form-data">
            {{-- CSRF Token for security --}}
            @csrf
            
            {{-- Method Spoofing for POST request --}}
            @csrf
            @method('POST')
            
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" placeholder="Entrez le nom de la collection" value="{{ old('nom') }}">
            </div>
            
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea id="description" name="description" placeholder="Décrivez la collection...">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="photo">Photo de la collection</label>
                <input type="file" name="photo" class="form-control">
            </div>
            
            <button type="submit" class="submit-btn">
                <i class="fas fa-save"></i> Enregistrer
            </button>
            
            @if($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </form>
    </div>
</body>
</html>