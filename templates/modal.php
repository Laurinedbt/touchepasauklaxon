<div class="modal fade" id="tripModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <p>Auteur : <strong><span id="modalAuteur"></span></strong></p>
        <p>Téléphone : <strong><span id="modalPhone"></span></strong></p>
        <p>Mail : <strong><span id="modalMail"></span></strong></p>
        <p>Nombre total de places : <span id="modalPlaces"></span></p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>

    </div>
  </div>
</div>

<script>
    const tripModal = document.getElementById('tripModal');

    if (tripModal) {
        tripModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;

            document.getElementById('modalAuteur').textContent = button.dataset.auteur || '';
            document.getElementById('modalPhone').textContent  = button.dataset.phone || '';
            document.getElementById('modalMail').textContent   = button.dataset.mail || '';
            document.getElementById('modalPlaces').textContent = button.dataset.places || '';
        });
    }
</script>
