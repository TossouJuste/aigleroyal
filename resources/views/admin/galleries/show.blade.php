@include('admin.header')
@include('admin.nav')

<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Tableau de bord</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.galleries.index') }}">Les galeries</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Détails de la galerie</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-primary" href="{{ route('admin.galleries.index') }}" role="button">Retour à la liste</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Détails de la Galerie</h4>
                </div>
                <div class="pd-20">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" style="width: 100%; height: auto;">
                        </div>
                        <div class="col-md-6">
                            <h4>{{ $gallery->title }}</h4>
                            <p><strong>Description:</strong> {{ $gallery->description }}</p>
                            <p><strong>Date:</strong> {{ $gallery->created_at->format('d-m-Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
        </div>
    </div>
</div>

</body>
</html>
