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
            <div class="row">


                <div class="col-lg-3">
                    <p>Cover:</p>
                    <form action="/deletecover/{{ $Produits->id }}" method="post">
                    <button class="btn text-danger">X</button>
                    @csrf
                    @method('delete')
                    </form>
                <img src="/cover/{{$Produits->cover}}" class="img-responsive" style="max-width: 200px; max-height: 200px;" alt="" srcset="">
                <BR>

                 
                
                
                </div>
                <div class="col-lg-6">
                    <h3 class="text-center text-danger"><b>Edit Produit</b> </h3>
				    <div class="form-group">
                        <form action="/update/{{ $Produits->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method ("put")
        				<input type="text" name="nom" class="form-control m-2" placeholder="title" value="{{ $Produits->nom}}">
        				<input type="text" name="adm_nom" class="form-control m-2" placeholder="Admin" value="{{ $Produits->adm_Nom }}">
        				<input type="text" name="quantite" class="form-control m-2" placeholder="quantite" value="{{ $Produits->quantite }}">
                        <Textarea name="categorie" cols="20" rows="4" class="form-control m-2" placeholder="categorie" >{{ $Produits->categorie }}</Textarea>
                        <label class="m-2">Cover Image</label>
                        <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="cover">
                       <button type="submit" class="btn btn-danger mt-3 ">Submit</button>
                        </form>
                    </div>
                </div>
            </div>



        </body>
</html>