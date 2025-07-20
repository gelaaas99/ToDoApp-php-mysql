<?php
// include "../db/connection.php";

function showTasks($conn)
{
    $stmt = $conn->prepare("SELECT * FROM tasks ORDER BY id ASC");
    $stmt->execute();

    $result = $stmt->get_result();

    echo '<div class="table-responsive">';

    echo '<table class="table table-striped table-bordered">';
    echo '<thead class="table-dark">
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Hecho</th>
                <th>Eliminar</th>
                <th>Modificar</th>
            </tr>
            </thead>';
    echo '<tbody>';

    while ($fila = $result->fetch_assoc()) {
        $checked = $fila['done'] ? 'checked' : '';

        echo "<tr>
                <td>{$fila['title']}</td>
                <td class='text-wrap text-break w-50' >{$fila['description']}</td>
                <td>
                <form action='tasks/complete.php' method='post'>
                    <input type='hidden' name='id' value='{$fila['id']}'>
                    <input type='checkbox' name='done' onchange='this.form.submit()' $checked>
                </form>
                </td>
                <td>
                <a href='tasks/delete.php?id={$fila['id']}' class='btn btn-sm btn-danger'>🗑 Eliminar</a>
                </td>
                <td>
                    <button 
                        type='button' 
                        class='btn btn-sm btn-warning' 
                        data-bs-toggle='modal' 
                        data-bs-target='#editarModal'
                        onclick=\"cargarDatosModal({$fila['id']}, '" . htmlspecialchars($fila['title'], ENT_QUOTES) . "', '" . htmlspecialchars($fila['description'], ENT_QUOTES) . "')\">
                        ✏️ Modificar
                    </button>

                </td>
            </tr>";
    }

    echo '</tbody>';
    echo '</table>';

    echo '</div>';
}

?>

<!-- <a href='tasks/update.php?id={$fila['id']}' class='btn btn-sm btn-warning'>✏️ Modificar</a> -->
