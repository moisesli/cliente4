          <!-- Totales de Factura -->
          <h4 class="d-flex justify-content-between align-items-center mb-3 mt-4">
            <span class="text-muted">Totales de Factura</span>
            <span class="badge badge-secondary badge-pill">4</span>
          </h4>

          <!-- Pasos -->
          <ul class="list-group mb-3">

            <!-- Descuento Gloobal -->
            <li class="list-group-item d-flex justify-content-between lh-condensed pt-1 pb-1">
              <div>
                <h6 class="my-0 text-muted">Descuento Global %</h6>
                <small class="text-muted">de toda la factura</small>
              </div>
              <span class="text-muted">0.00</span>
            </li>

            <!-- Exonerada -->
            <li class="list-group-item d-flex justify-content-between lh-condensed pt-1 pb-1">
              <div>
                <h6 class="my-0 text-muted">Exonerada</h6>
                <small class="text-muted">Sin registrar</small>
              </div>
              <span class="text-muted">0.00</span>
            </li>

            <!-- Inafecta -->
            <li class="list-group-item d-flex justify-content-between lh-condensed pt-1 pb-1">
              <div>
                <h6 class="my-0 text-muted">Inafecta</h6>
                <small class="text-muted">Sin registrar</small>
              </div>
              <span class="text-muted">0.00</span>
            </li>

            <!-- Grabadas -->
            <li class="list-group-item d-flex justify-content-between lh-condensed pt-1 pb-1">
              <div>
                <h6 class="my-0 text-muted">Grabadas</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">0.00</span>
            </li>

            <!-- IGV -->
            <li class="list-group-item d-flex justify-content-between pt-1 pb-1">
              <div>
                <h6 class="my-0 text-muted">I.G.V.</h6>
                <small class="text-muted">Impuestos Sunat</small>
              </div>
              <span class="text-muted">0.00</span>
            </li>

            <!-- Gratuitas -->
            <li class="list-group-item d-flex justify-content-between lh-condensed pt-1 pb-1">
              <div>
                <h6 class="my-0 text-muted">Gratuitas</h6>
              </div>
              <span class="text-muted">0.00</span>
            </li>

            <!-- Otros Cargos -->
            <li class="list-group-item d-flex justify-content-between lh-condensed pt-1 pb-1">
              <div>
                <h6 class="my-0 text-muted">Otros Cargos</h6>
              </div>
              <span class="text-muted">0.00</span>
            </li>

            <!-- Otros Cargos -->
            <li class="list-group-item d-flex justify-content-between lh-condensed pt-1 pb-1">
              <div>
                <h6 class="my-0 text-muted">Descuento Total</h6>
              </div>
              <span class="text-muted">0.00</span>
            </li>

            <!-- TOTAL -->
            <li class="list-group-item d-flex justify-content-between bg-light pt-1 pb-1">
              <span class="text-success"><strong>TOTAL (Soles)</strong></span>
              <strong>{{ invoice.total = sumatotal() }}</strong>
            </li>


          </ul>