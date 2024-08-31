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
                                <li class="breadcrumb-item active" aria-current="page">Les galeries</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-primary" href="{{ route('admin.galleries.create') }}" role="button">NOUVELLE GALERIE</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Export Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Liste totale des galeries</h4>
                </div>
                <div class="pb-20">
                    <table id="galleriesTable" class="data-table table nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Image</th>
                                <th>Titre</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($galleries as $gallery)
                                <tr>
                                    <td><img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" style="width: 100px; height: auto;"></td>
                                    <td>{{ $gallery->title }}</td>
                                    <td>{{ $gallery->created_at->format('d-m-Y') }}</td>
                                    <td>{{ Str::limit($gallery->description, 50) }}</td>
                                    <td>
    <a href="{{ route('admin.galleries.show', $gallery->id) }}" class="btn btn-info">Voir</a>
    <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="btn btn-warning">Modifier</a>
    <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" style="margin-left: 5px;">Supprimer</button>
    </form>
</td>

<!-- Ajoutez le CSS dans une balise <style> -->
<style>
    /* Assure que les formulaires sont alignés avec les boutons */
    form {
        display: inline;
    }

    .btn {
        margin-left: 5px; /* Ajuste l'espacement entre les boutons */
    }
</style>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Export Datatable End -->
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
        </div>
    </div>
</div>
 
<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cette galerie ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                <form id="deleteForm" method="POST" action="" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Oui</button>
                </form>
            </div>
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
