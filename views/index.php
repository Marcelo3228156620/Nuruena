<?php
include_once 'models/AreaModel.php';
?>
<div id="wModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Nuevo archivo</h2>
        </div>
        <div class="modal-body">
            <form action="?controller=File&method=save" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="group">
                        <label for="file">Archivo</label>
                        <input type="file" name="file" id="file">
                    </div>
                </div>
                <div class="form-row">
                    <div class="group">
                        <label for="area_id">Area</label>
                        <select name="area_id" id="area_id">
                            <option>Seleccione...</option>
                            <?php
                            $areaModel = new Area;
                            $area = $areaModel->getAll();
                            foreach ($area as $ares) {
                                echo '<option value="' . $ares->id . '">' . $ares->name . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <input type="submit" class="bc-save" value="Guardar">
            </form>
        </div>
    </div>
</div>