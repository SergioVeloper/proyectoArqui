<div class="container mt-5">
    <?php
    $id_medico = $_GET['id_medico'];
    ?>
    <form action="javascript:insertarVisita()" id="insertarVisitarform" class="row g-3">
        <input type="hidden" name="idMedico" value="<?php echo $id_medico ?>">

        <div id="infoMedicos" class="col-12"></div>
        <div id="infoMuestras" class="col-12"></div>

        <div class="mb-3 col-12">
            <label for="comentarioMed" class="form-label">Comentario Médico:</label>
            <textarea id="comentarioMed" name="comentarioMed" rows="4" class="form-control" placeholder="Escriba el comentario del médico aquí..."></textarea>
        </div>

        <div class="mb-3 col-12">
            <label for="comentarioVis" class="form-label">Comentario Visitador:</label>
            <textarea id="comentarioVis" name="comentarioVis" rows="4" class="form-control" placeholder="Escribe su comentario aquí..."></textarea>
        </div>

        <div class="mb-3 col-12">
            <label for="fecha" class="form-label">Fecha de la visita:</label>
            <input type="date" name="fecha" class="form-control">
        </div>

        <div class="d-grid gap-2 text-center">
            <input type="submit" value="Registrar Visita" class="btn btn-primary">
        </div>
    </form>
    
</div>
