<link rel="stylesheet" href="css/style.css">
<nav>
    <ul>
        <li class="rightli"><a href="?controller=User&method=close">Cerrar sesión</a></li>
    </ul>
</nav>
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
                    <a href="Doc/<?php echo $file->name; ?>" download="<?php echo $file->name ?>" class="bc-save">Descargar</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>