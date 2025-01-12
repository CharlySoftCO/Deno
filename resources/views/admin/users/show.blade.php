<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-gradient-primary text-white">
                <h5 class="modal-title" id="userModalLabel">
                    <i class="fas fa-user-circle"></i> Detalles del Usuario
                </h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 text-center mb-3">
                            <img id="user-photo" src="" alt="Foto de Usuario" class="img-thumbnail shadow-sm" style="max-width: 150px;">
                        </div>
                        <div class="col-md-8">
                            <p><strong>Tipo de Documento:</strong> <span id="user-document-type"></span></p>
                            <p><strong>Número de Documento:</strong> <span id="user-document-number"></span></p>
                            <p><strong>Nombre:</strong> <span id="user-name"></span></p>
                            <p><strong>Correo Electrónico:</strong> <span id="user-email"></span></p>
                            <p><strong>Teléfono:</strong> <span id="user-phone"></span></p>
                            <p><strong>Estado:</strong> <span id="user-is-active"></span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i> Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
