<h1>Editar usuario</h1>
<div class="container">
    <form action="?controller=User&method=update" method="POST">
        <input type="hidden" name="id" value="<?php echo $users[0]->id; ?>">

        <div class="form-row">
            <div class="group">
                <label for="name">Nombres</label>
                <input type="text" id="name" name="name" value="<?php echo $users[0]->name; ?>">
            </div>
            <div class="group">
                <label for="userSap">Usuario SAP</label>
                <input type="text" id="userSap" name="userSap" value="<?php echo $users[0]->userSap; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="group">
                <label for="user">Usuario</label>
                <input type="text" name="user" id="user" value="<?php echo $users[0]->user; ?>">
            </div>
            <div class="group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" value="<?php echo $users[0]->password; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="group">
                <label for="ext">Extensión</label>
                <input type="number" id="ext" name="ext" value="<?php echo $users[0]->ext; ?>">
            </div>
            <div class="group">
                <label for="sede_id">Sede</label>
                <select name="sede_id" id="sede_id">
                    <?php
                    foreach ($sedes as $sedes) {
                        if ($sedes->id == $users[0]->sede_id) {
                            echo '<option selected value="'.$sedes->id. '">'.$sedes->name.'</option>';
                        } else {
                            echo '<option value="'.$sedes->id.'">'.$sedes->name.'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="group">
                <label for="rol_id">Rol</label>
                <select name="rol_id" id="rol_id">
                    <?php
                    foreach ($roles as $roles) {
                        if ($roles->id == $users[0]->rol_id) {
                            echo '<option selected value="'.$roles->id.'">'.$roles->name.'</option>';
                        } else {
                            echo '<option value="'.$roles->id.'">'.$roles->name.'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="group">
                <label for="areas">Area</label>
                <select name="areas" id="areas">
                    <?php
                    echo '<option selected value="'.$area[0]->id.'">'.$area[0]->name.'</option>';
                    foreach ($areas as $areas) {
                        echo '<option value="'.$areas->id.'">'.$areas->name.'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="group">
                <label for="charge_id">Cargo</label>
                <select name="charge_id" id="charge_id">
                    <?php
                    echo '<option selected value="'.$charge[0]->id.'">'.$charge[0]->name.'</option>';
                    ?>
                </select>
            </div>
        </div>
        <div>
            <input type="submit" class="bc-save" value="Guardar">
            <input type="button" class="bc-cancel" onclick="history.back()" value="Cancelar">
        </div>
    </form>
</div>