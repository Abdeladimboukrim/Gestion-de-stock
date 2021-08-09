<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel gestion de stock</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    </head>
    <body>
    <div class="container" style="margin-top: 50px;">

<h3 class="text-center text-danger"><b>gestion de stock</b> </h3>
<a href="/create" class="btn btn-outline-success">Add New Produit</a>

<table class="table">
    <thead>
    <tr>
        
        <th>id</th>
        <th>Nom</th>
        <th>quantite</th>
        <th>categorie</th>
        <th>Adm_nom</th>
        <th>Cover</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    </thead>

    <tbody>

    @foreach($Produits as $produit)


    <tr>
        <th scope="row">{{$produit->id}}</th>
        <td>{{$produit->nom}}</td>
        <td>{{$produit->quantite}}</td>
        <td>{{$produit->categorie}}</td>
        <td>{{$produit->adm_Nom}}</td>
        <td><img src="cover/{{$produit->cover}}" class="img-responsive" style="max-width: 100px; max-height: 100px" alt=""></td>
        <td><a href="/edit/{{$produit->id}}" class="btn btn-outline-primary">Update</a></td>
        <td>
            <form action="/delete/{{$produit->id}}" method="post">
            <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?');" type="submit">Delete</button>
            @csrf
            @method('delete')
            </form>
        </td>
    </tr>
    @endforeach()
</tbody>
</table>
</div>
    </body>
</html>