<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/png" href="/preval_web/img/logo_s.jpg">

    <!--API MAPS-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <style>
        /* Estilos adicionales para el mapa */
        #map {
            height: 400px;
            width: 100%;
            border-radius: 5px;
        }

        .leaflet-container {
            z-index: 1;
        }
    </style>
</head>

<body>

    <?php
    require_once $_SERVER["DOCUMENT_ROOT"] . "/preval_web/parcials/employerNab.php";
    ?>

    <form id="quotation" class="form m-5" action="" method="POST">
        <div class="card shadow mb-4">
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    <h3 class="mb-0">Cotización de Productos</h3>
                    <p class="text-muted"><?= isset($quotationId) ? 'Editar' : 'Complete todos los campos requeridos' ?></p>
                </div>

                <!-- Producto -->
                <div class="mb-3">
                    <label for="product" class="form-label fw-bold">
                        <i class="fas fa-box me-2"></i>Producto:
                    </label>
                    <?php if (isset($quotationData)): ?>
                        <input type="hidden" name="quotationId" value="<?= $quotationData->quotationId ?>">
                    <?php endif; ?>
                    <select class="form-select" name="productId" id="product" required onchange="updateProductCost(this)">
                        <?php if (!isset($quotationData)): ?>
                            <option value="" disabled selected>Seleccione un producto</option>
                        <?php endif; ?>
                        <?php foreach ($products as $product): ?>
                            <option value="<?= $product->productId ?>" data-cost="<?= $product->productCost ?>">
                                <?= htmlspecialchars($product->productName) . ' (' . $product->productCost . '$, ' . $product->quantity . ' Litros)' ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="hidden" name="productCost" id="productCost" value="<?= $quotationData->productCost ?? '' ?>">

                <!-- Estructura -->
                <div class="mb-3">
                    <label for="structure" class="form-label fw-bold">
                        <i class="fas fa-project-diagram me-2"></i>Estructura:
                    </label>
                    <textarea class="form-control" name="structureType" id="structure" rows="3"
                        placeholder="Describa la estructura requerida"><?= $quotationData->structureType ?? '' ?></textarea>
                </div>

                <div class="row">
                    <!-- Costo Estructura -->
                    <div class="col-md-6 mb-3">
                        <label for="structureCost" class="form-label fw-bold">
                            <i class="fas fa-dollar-sign me-2"></i>Costo estructura:
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" min="0" class="form-control" name="structureCost" value="<?= $quotationData->structureCost ?? '' ?>"
                                id="structureCost" placeholder="350.00" step="0.01" required>
                        </div>
                    </div>

                    <!-- Distancia -->
                    <div class="col-md-6 mb-3">
                        <label for="distance" class="form-label fw-bold">
                            <i class="fas fa-route me-2"></i>Distancia:
                        </label>
                        <div class="input-group">
                            <input id="distancia" type="number" step="0.01" min="0" class="form-control" name="distance" step="0.01" min="0" value="<?= $quotationData->distance ?? '' ?>"
                                placeholder="400" required>
                            <span class="input-group-text">km</span>
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#mapModal" id="mapButton">
                                <i class="bi bi-globe-americas"></i>
                            </button>
                        </div>
                    </div>
                </div>


               
                <hr> <!-- gastos extras -->
                <label for="distance" class="form-label fw-bold">
                    <i class="fas fa-route me-2"></i>Gastos del viaje:
                </label>

                <div class="row">
                    <!-- Costo combustible -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">
                            <i class="fas fa-gas-pump me-2"></i>Costo combustible:
                        </label>
                        <div class="input-group">
                            <input type="number" step="0.01" min="0" class="form-control"
                                id="costoCombustible" placeholder="3.50" required>
                            <span class="input-group-text">$</span>
                        </div>
                    </div>

                    <!-- Consumo combustible -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">
                            <i class="fas fa-tachometer-alt me-2"></i>Consumo combustible:
                        </label>
                        <select id="consumo" name="consumo" class="form-select" required>
                            <option value="20">20 km/galón</option>
                            <option value="30">30 km/galón</option>
                            <option value="40">40 km/galón</option>
                            <option value="50">50 km/galón</option>
                        </select>
                    </div>

                    <!-- Gastos extras -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold">
                            <i class="fas fa-wallet me-2"></i>Gastos extras:
                        </label>
                        <div class="input-group">
                            <input type="number" step="0.01" min="0" class="form-control"
                                id="gastosExtras" placeholder="0.00" required>
                            <span class="input-group-text">$</span>
                        </div>
                    </div>
                </div>



                <!-- Costo Viaje -->
                <div class="mb-4">
                    <label for="travelCost" class="form-label fw-bold">
                        <i class="fas fa-truck me-2"></i>Costo viaje:
                    </label>
                    <div class="input-group">
                        <button type="button" class="btn btn-success" onclick="calcTotalTravel()"> Calcular</button>
                        <span class="input-group-text">$</span>
                        <input type="number" step="0.01" min="0" class="form-control" name="distanceCost" value="<?= $quotationData->distanceCost ?? '' ?>"
                            id="travelCost" placeholder="400" required readonly>
                    </div>
                </div>

                <!-- Botón de generar -->
                <button type="submit" class="btn btn-primary w-100 py-2" name="transaction" value="<?= isset($quotationData) ? 'edit' : 'add' ?>">
                    <i class="fas fa-calculator me-2"></i>Generar
                </button>
            </div>
        </div>
    </form>

    <!-- Modal -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/preval_web/modals/mapModal.php' ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Variables globales
        let map, markers = [],
            routeLayer;

        // Inicializar el mapa cuando el modal se muestra completamente
        document.getElementById('mapModal').addEventListener('shown.bs.modal', function() {
            initMap();
        });

        function initMap() {
            // Destruir el mapa existente si hay uno
            if (map) {
                map.remove();
            }

            // Crear un nuevo mapa
            map = L.map('map').setView([-0.1807, -78.4678], 13);

            // Cargar mapa de OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Ajustar el tamaño del mapa después de un pequeño retraso
            setTimeout(function() {
                map.invalidateSize();
            }, 100);

            // Limpiar marcadores anteriores
            markers.forEach(marker => map.removeLayer(marker));
            markers = [];

            // Eliminar ruta anterior si existe
            if (routeLayer) {
                map.removeLayer(routeLayer);
            }

            // Agregar evento de clic al mapa
            map.on('click', function(e) {
                if (markers.length < 2) {
                    let marker = L.marker(e.latlng).addTo(map);
                    markers.push(marker);

                    if (markers.length === 2) {
                        calcularRuta();
                    }
                }
            });
        }

        function calcularRuta() {
            if (markers.length !== 2) return;

            let origen = markers[0].getLatLng();
            let destino = markers[1].getLatLng();

            let url = `https://router.project-osrm.org/route/v1/driving/${origen.lng},${origen.lat};${destino.lng},${destino.lat}?overview=full&geometries=geojson`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.code === 'Ok') {
                        // Calcular distancia
                        let distanciaMetros = data.routes[0].distance;
                        let distanciaKm = (distanciaMetros / 1000).toFixed(2);

                        // Mostrar la ruta en el mapa
                        if (routeLayer) {
                            map.removeLayer(routeLayer);
                        }

                        let rutaCoordenadas = data.routes[0].geometry.coordinates;
                        let geojsonRuta = {
                            type: "LineString",
                            coordinates: rutaCoordenadas
                        };

                        routeLayer = L.geoJSON(geojsonRuta, {
                            style: {
                                color: '#007bff',
                                weight: 4,
                                opacity: 0.7
                            }
                        }).addTo(map);

                        // Ajustar la vista para mostrar toda la ruta
                        map.fitBounds(routeLayer.getBounds());

                        // Guardar la distancia en una variable temporal
                        window.distanciaTemp = distanciaKm;
                    } else {
                        alert('No se pudo calcular la ruta. Intente con otras ubicaciones.');
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert('Error al conectar con el servidor de rutas.');
                });
        }

        function aceptarDistancia() {
            if (window.distanciaTemp) {
                document.getElementById("distancia").value = window.distanciaTemp;
            }
            resetMapa();
        }

        function resetMapa() {
            // Limpiar marcadores
            markers.forEach(marker => map.removeLayer(marker));
            markers = [];

            // Eliminar ruta
            if (routeLayer) {
                map.removeLayer(routeLayer);
                routeLayer = null;
            }

            // Resetear variable temporal
            window.distanciaTemp = null;
        }

        // Validación de Bootstrap
        document.getElementById('quotation').addEventListener('submit', function(e) {
            if (!confirm('¿Estás seguro de que deseas calcular esta cotización?')) {
                e.preventDefault();
            }
        });

        function updateProductCost(select) {
            const selectedOption = select.options[select.selectedIndex];
            document.getElementById('productCost').value = selectedOption.dataset.cost;
        }


        function calcTotalTravel() {
            const distancia = parseFloat(document.getElementById('distancia').value) || 0;
            const costoCombustible = parseFloat(document.getElementById('costoCombustible').value) || 0;
            const consumo = parseFloat(document.getElementById('consumo').value) || 1; // Evitar división por cero
            const gastosExtras = parseFloat(document.getElementById('gastosExtras').value) || 0;

            // Cálculo del costo del viaje
            const galonesNecesarios = distancia / consumo;
            const costoTotalCombustible = galonesNecesarios * costoCombustible;
            const costoTotalViaje = costoTotalCombustible + gastosExtras;

            // Actualizar el campo de costo del viaje
            document.getElementById('travelCost').value = costoTotalViaje.toFixed(2);
        }


    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>