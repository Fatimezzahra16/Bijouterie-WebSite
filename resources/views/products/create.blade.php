<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	 <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
                textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
	    <h1>Informations du produits: </h1>
    <form action="{{route('product.store')}}" method="post">
    	@csrf
    	@method('post')
        <div class="form-group">
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>
        </div>

        <div class="form-group">
            <label for="price">Prix (MAD):</label>
            <input type="number" id="price" name="price" min="0" step="0.01" required>
        </div>
        
        
        <div class="form-group">
            <label for="qty">Quantité:</label>
            <input type="number" id="qty" name="qty" min="1" required>
        </div>

        <select name="collection_id" required>
        <option value="">Select a collection</option>
        @foreach($collections as $collection)
            <option value="{{ $collection->id }}" {{ old('collection_id') == $collection->id ? 'selected' : '' }}>
                {{ $collection->name }}
            </option>
        @endforeach
    </select>
        
        
        
        
        <button type="submit">Enregistrer </button>
    </form>
    <div>
    	@if($errors->any())
    	<ul>
    		@foreach($errors->all() as $error)
    		<li>{{$error}}</li>
    		@endforeach
    	@endif
    </div>

    
    <br><br>
    <div>
    	<a href="{{route('product.index')}}">
    		<button>return home</button>
    	</a>
    </div>

</body>
</html>