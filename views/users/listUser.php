<?php
    require 'views/layout.php';
    require 'views/index.php';
?>
<div>
    <h1>Usuarios</h1>
</div>
<div>
    <select name="sede" id="sede">
    <option value=""></option>
    <?php
        foreach ($sedes as $sedes) {
            echo '<option value="' . $sedes->id . '">' . $sedes->name . '</option>';
        }
    ?>
    </select>
</div>
<!--<div id="pruebita" class="prueba-off">-->
<table id="myTable">
    <thead>
        <th>Nombre</th>
        <th onclick="sortTable(1)">Sede</th>
        <th>Usuario SAP</th>
        <th>Cargo</th>
        <th>Funciones</th>
    </thead>
    <tbody id="Data">
    <?php foreach ($users as $users) : ?>
            <tr>
                <td><?php echo $users->name ?></td>
                <td><?php echo $users->sede ?></td>
                <td><?php echo $users->userSap ?></td>
                <td><?php echo $users->charge ?></td>
                <td><a href="?controller=User&method=edit&id=<?php echo $users->id; ?>" class="bc-save">Editar</a>
                    <a href="?controller=User&method=delete&id=<?php echo $users->id; ?>" class="bc-cancel" onclick="return confirm('Esta seguro de eliminar ?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<!--</div>-->
