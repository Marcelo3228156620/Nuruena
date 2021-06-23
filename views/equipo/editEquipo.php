<h1>Editar Equipo</h1>
<div class="container">
    <form action="?controller=Computer&method=update" method="POST">

        <input type="hidden" name="id" id="id" value="<?php echo $equipo[0]->id; ?>">

        <div class="form-row">
            <div class="group">
                <label for="computer">Equipo</label>
                <select name="computer" id="computer">
                    <option value="<?php echo $equipo[0]->computer; ?>" selected><?php echo $equipo[0]->computer; ?></option>
                    <?php
                    $equipos = array("portatil", "escritorio", "todo_en_uno");

                    for ($i = 0; $i < 3; $i++) {
                        if ($equipos[$i] != $equipo[0]->computer) {
                            echo "<option value=" . $equipos[$i] . ">" . $equipos[$i] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="group">
                <label for="provider">Marca</label>
                <input type="text" id="provider" name="provider" value="<?php echo $equipo[0]->provider; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="group">
                <label for="serial">Serial</label>
                <input type="text" name="serial" id="serial" value="<?php echo $equipo[0]->serial; ?>">
            </div>
            <div class="group">
                <label for="model">Modelo</label>
                <input type="text" name="model" id="model" value="<?php echo $equipo[0]->model; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="group">
                <label for="ip">Dirección IP</label>
                <input type="text" id="ip" name="ip" value="<?php echo $equipo[0]->ip; ?>" onblur="validateIP(false)">
                <span id="ipValidateEdit" class="ipvalidate-off">Esta dirección IP ya existe</span>
            </div>
            <div class="group">
                <label for="ipTel">Dirección IP teléfono</label>
                <input type="text" id="ipTel" name="ipTel" value="<?php echo $equipo[0]->ipTel; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="group">
                <label for="win_Version">Version S.O</label>
                <select name="win_Version" id="win_Version">
                    <option value="<?php echo $equipo[0]->win_Version; ?>" selected><?php echo $equipo[0]->win_Version; ?></option>
                    <?php
                    $version = array("Windows_10_x64", "Windows_10_x32", "Windows_7_x64", "Windows_7_x32");

                    for ($i = 0; $i < 4; $i++) {
                        if ($version[$i] != $equipo[0]->win_Version) {
                            echo "<option value=" . $version[$i] . ">" . $version[$i] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="group">
                <label for="user_id">Usuario</label>
                <select name="user_id" id="user_id">
                    <option>Seleccione...</option>
                    <?php
                    foreach ($users as $users) {
                        if ($users->id == $equipo[0]->user_id) {
                            echo '<option selected value="' . $users->id . '">' . $users->name . '</option>';
                        } else {
                            echo '<option value="' . $users->id . '">' . $users->name . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="group">
                <label for="workstation_id">Estacion de trabajo</label>
                <select name="workstation_id" id="workstation_id">
                    <option>Seleccione...</option>
                    <?php
                    foreach ($workstation as $workstation) {
                        if ($workstation->id == $equipo[0]->workstation_id) {
                            echo '<option selected value="' . $workstation->id . '">' . $workstation->name . '</option>';
                        } else {
                            echo '<option value="' . $workstation->id . '">' . $workstation->name . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="group">
                <label for="active">Esta versión tiene licencia?</label>
                <?php
                if ($equipo[0]->active != "X") {
                    echo '<div>
                            <input type="radio" name="active" value="✔" checked/>
                            <label>Si</label>
                        </div>
                        <div>
                            <input type="radio" name="active" value="X"/>
                            <label>No</label>
                        </div>';
                } else {
                    echo '<div>
                                <input type="radio" name="active" value="✔"/>
                                <label>Si</label>
                            </div>
                            <div>
                                <input type="radio" name="active" value="X" checked/>
                                <label>No</label>
                            </div>';
                }
                ?>
            </div>
        </div>
        <div class="form-row">
            <div class="group">
                <label for="comment">Observaciones</label>
                <textarea class="textArea" name="comment" id="comment" rows="3" value="<?php echo $equipo[0]->comment; ?>"><?php echo $equipo[0]->comment; ?></textarea>
            </div>
        </div>
        <div>
            <input type="submit" class="bc-save" value="Guardar">
            <input type="button" class="bc-cancel" onclick="history.back()" value="Cancelar">
        </div>
    </form>
</div>