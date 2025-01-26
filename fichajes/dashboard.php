<?php
require 'config.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Obtener registros de fichajes
$stmt = $pdo->prepare("SELECT * FROM registros WHERE usuario_id = ? ORDER BY clock_in DESC");
$stmt->execute([$_SESSION['user_id']]);
$registros = $stmt->fetchAll();

// Verificar si hay un fichaje activo
$currentEntry = null;
foreach($registros as $registro) {
    if($registro['clock_out'] === null) {
        $currentEntry = $registro;
        break;
    }
}
?>
<?php include 'header.php'; ?>

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card mb-4">
            <div class="card-body text-center">
                <h3 class="card-title">Registro de Asistencia</h3>
                <form action="clock_process.php" method="post">
                    <?php if($currentEntry): ?>
                        <input type="hidden" name="action" value="clock_out">
                        <button type="submit" class="btn btn-danger btn-lg">Registrar Salida</button>
                    <?php else: ?>
                        <div class="mb-3">
                            <textarea class="form-control" name="notas" placeholder="Notas (opcional)"></textarea>
                        </div>
                        <input type="hidden" name="action" value="clock_in">
                        <button type="submit" class="btn btn-success btn-lg">Registrar Entrada</button>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <h4 class="mb-3">Historial de Fichajes</h4>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Entrada</th>
                        <th>Salida</th>
                        <th>Duración</th>
                        <th>Notas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($registros as $registro): ?>
                    <tr>
                        <td><?= date('d/m/Y H:i', strtotime($registro['clock_in'])) ?></td>
                        <td><?= $registro['clock_out'] ? date('d/m/Y H:i', strtotime($registro['clock_out'])) : '--' ?></td>
                        <td>
                            <?php if($registro['clock_out']): ?>
                                <?php
                                $start = new DateTime($registro['clock_in']);
                                $end = new DateTime($registro['clock_out']);
                                $diff = $start->diff($end);
                                echo $diff->format('%H:%I:%S');
                                ?>
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($registro['notas']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>