@extends('admin.master')
@section('content')
    <section id="admin-content" class="col-sm-9 ml-sm-auto col-md-10">
        <div class="row">
            <div>
                @include('admin.includes.sidenav')
            </div>
            <div class="col-sm-9 ml-sm-auto col-md-10">
                <h2 class="text-success">Hello {{strtoupper(Auth::user()->name)}}</h2>
                <h2 class="text-info">What's on your mind</h2>
                <div class="row text-center placeholders">
                    @if(Auth::check() && (Auth::user()->isAdmin()))
                        <div class="col-lg-3 col-sm-6 placeholder">
                            <a href="">
                                <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                            </a>
                            <h4>Utilisateurs</h4>
                            <div class="text-muted">
                                <p>Voir l'état des utilisateurs, faire de l'utilisateur un administrateur ou non, et le supprimer</p>
                            </div>
                        </div>
                    @endif
                    <div class="col-lg-3 col-sm-6 placeholder">
                        <a href="{{url('admin/products')}}">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                        </a>
                        <h4>Products</h4>
                        <span class="text-muted">Voir, modifier, ajouter et supprimer des produits</span>
                    </div>
                    <div class="col-lg-3 col-sm-6 placeholder">
                        <a href="{{url('admin/categories')}}">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                        </a>
                        <h4>Categories</h4>
                        <span class="text-muted">chaque produit appartient à une catégorie, donc dans cette section, vous pouvez ajouter et supprimer des catégories</span>
                    </div>
                        <div class="col-lg-3 col-sm-6 placeholder">
                            <a href="{{url('admin/ads')}}">
                                <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                            </a>
                            <h4>Annonces</h4>
                            <span class="text-muted">Ajout d'annonces et suppression</span>
                        </div>
                </div>
            </div>
        </div>
    </section>
@endsection
