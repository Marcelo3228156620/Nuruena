<div>
    <h1>Equipos</h1>
</div>
<table>
    <thead>
        <th>Direccion IP</th>
        <th>Equipo</th>
        <th>Usuario</th>
        <th>Observaciones</th>
        <th>Funciones</th>
    </thead>
    <tbody>
        <?php foreach ($equipos as $equipos) : ?>
            <tr>
                <td><?php echo $equipos->ip ?></td>
                <td><?php echo $equipos->computer ?></td>
                <td><?php echo $equipos->users ?></td>
                <td><?php echo $equipos->comment ?></td>
                <td><a href="?controller=Computer&method=edit&id=<?php echo $equipos->id; ?>" class="bc-save">Editar</a>
                    <a href="?controller=Computer&method=delete&id=<?php echo $equipos->id; ?>" onclick="return confirm('Esta seguro de eliminar ?')" class="bc-cancel">Eliminar</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>