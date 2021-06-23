<div id="wModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Nuevo archivo</h2>
        </div>
        <div class="modal-body">
            <form action="" method="POST" enctype="multipart/form-data">
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
                            $ar = $areas;
                            /*print_r($ar);
                            die();*/
                            foreach ($ar as $ares) {
                                    echo '<option value="' . $ares->id . '">' . $ares->name . '</option>';
                                }
                            /*foreach ($areas as $areas) {
                                echo '<option value="' . $areas->id . '">' . $areas->name . '</option>';
                            }*/
                            ?>
                        </select>
                    </div>
                </div>
                <input type="submit" class="bc-save" value="Guardar">
            </form>
        </div>
    </div>
</div>