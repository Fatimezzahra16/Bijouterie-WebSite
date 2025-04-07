<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Éditer Collection</title>
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
        
        .form-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        
        .delete-btn {
            background-color: #fdecea;
            color: #c0392b;
            padding: 12px 20px;
            border: 1px solid #f5c6cb;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s;
        }
        
        .delete-btn:hover {
            background-color: #f5c6cb;
        }
        /* File input hover effect */
        input[type="file"] + label:hover {
        border-color: #d4af37;
        color: #d4af37;
        }

        /* Image preview hover effect */
        .group:hover .group-hover\:bg-opacity-30 {
        background-color: rgba(0, 0, 0, 0.3);
        }

        /* Transition for smooth hover effects */
        .transition {
        transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 150ms;
        }
    </style>
</head>
<body>
    <a href="{{ route('collection.index') }}" class="back-btn">
        <i class="fas fa-arrow-left"></i> Retour aux collections
    </a>
    
    <div class="form-container">
        <h1>Éditer la collection</h1>
        <form method="post" action="{{ route('collection.update', ['collection' => $collection]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" value="{{ old('nom', $collection->nom) }}" placeholder="Nom de la collection">
            </div>
            
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea id="description" name="description" placeholder="Description détaillée...">{{ old('description', $collection->description) }}</textarea>
            </div>

            <div class="form-group">
                <label class="block text-sm font-medium text-gray-700 mb-2">Changer la photo :</label>
                
                <div class="flex items-center">
                    <!-- File Input -->
                    <div class="relative flex-1">
                        <input type="file" name="photo" id="photo" value="{{ old('photo') }} "
                               class="opacity-0 absolute inset-0 w-full h-full cursor-pointer">
                       
                    </div>
                </div>
            
            <button type="submit" class="submit-btn">
                <i class="fas fa-save"></i> Enregistrer les modifications
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
        
        <div class="form-footer">
            <form method="POST" action="{{ route('collection.delete', ['collection' => $collection]) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette collection ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn">
                    <i class="fas fa-trash-alt"></i> Supprimer la collection
                </button>
            </form>
        </div>
    </div>
</body>
</html>