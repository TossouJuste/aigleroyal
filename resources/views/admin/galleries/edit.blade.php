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
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Tableau de bord</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.galleries.index') }}">Les galeries</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Modifier la galerie</li>
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
                    <h4 class="text-blue h4">Modifier la Galerie</h4>
                </div>
                <div class="pd-20">
                <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $gallery->title) }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" class="form-control">{{ old('description', $gallery->description) }}</textarea>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" class="form-control">
        @if($gallery->image)
            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" style="width: 100px; height: auto; margin-top: 10px;">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>

                </div>
            </div>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
        </div>
    </div>
</div>


<!-- js -->
<script src="{{ asset('vendors/scripts/core.js') }}"></script>
<script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
<script src="{{ asset('vendors/scripts/process.js') }}"></script>
<script src="{{ asset('vendors/scripts/layout-settings.js') }}"></script>
<script src="{{ asset('src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendors/scripts/dashboard.js') }}"></script>
<!-- buttons for Export datatable -->
<script src="{{ asset('src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('src/plugins/datatables/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('src/plugins/datatables/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('src/plugins/datatables/js/vfs_fonts.js') }}"></script>
<!-- Datatable Setting js -->
<script src="{{ asset('vendors/scripts/datatable-setting.js') }}"></script>

<script>
    $(document).ready(function() {
        if (!$.fn.DataTable.isDataTable('#galleriesTable')) {
            $('#galleriesTable').DataTable({
                "lengthMenu": [5, 10, 25, 50, 75, 100],
                "pageLength": 10,
                "ordering": true,
                "order": [[0, 'desc']],
                "columnDefs": [{
                    "targets": 'datatable-nosort',
                    "orderable": false,
                }]
            });
        }

        // Gérer le clic sur le lien de suppression
        $('.delete-gallery-link').click(function() {
            // Récupérer l'ID de la galerie à supprimer
            var galleryId = $(this).data('realisation-id');

            // Mettre à jour le lien "Oui" du modal avec l'ID de la galerie
            $('#confirmDeleteButton').attr('href', '{{ url("galleries") }}/' + galleryId);
        });
    });
</script>

</body>
</html>
