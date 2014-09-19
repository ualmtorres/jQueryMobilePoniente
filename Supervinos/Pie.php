<div data-role = "footer" data-position="fixed">
    <div data-role = "navbar">
        <ul>
            <!-- Botón predeterminado aplicándole la clase ui-btn-active -->
            <li>
                <a href = 'Vinos.php' data-role = "button" class = "ui-btn-active" data-icon = "home">Inicio</a>
            </li>

            <!-- Botón Comentarios -->
            <li>
                <a href = 'comentarios.php?idVino=<?php echo $idVino; ?>' data-role = "button" data-icon = "grid">Comentarios</a>
            </li>
        </ul>
    </div>
</div>
