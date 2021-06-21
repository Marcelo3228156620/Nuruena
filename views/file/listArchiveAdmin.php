<div>
    <h1>Archivos <?php echo $id; ?></h1>
</div>
<table>
    <thead>
        <th>ID</th>
        <th>Nombre del archivo</th>
        <th>Funciones</th>
    </thead>
    <tbody>
        <?php foreach ($files as $file) : ?>
        <tr>
            <td><?php echo $file->id ?></td>
            <td><?php echo $file->name ?></td>
            <td>
                <a href="Doc/<?php echo $file->name; ?>" download="<?php echo $file->name?>" class="bc-save">Descargar</a>
                <a href="?controller=File&method=delete&id=<?php echo $file->id ?>&name=Doc/<?php echo $file->name?>" onclick="return confirm('Esta seguro de eliminar ?')" class="bc-cancel">Eliminar</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>