<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> Nous vous proposons les régimes suivants: </h4>
                    
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> Nom régime </th>
                            <th> Durée (en jours)</th>
                            <th> Poids obtenu/perdu</th>
                            <th> Montant </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><?= $suggestion->get_regime()->get_nom_regime();?></td>
                            <td> <?= $suggestion->get_regime()->get_duree();?> </td>
                            <td>  <?= $suggestion->get_regime()->get_poids();?> </td>
                            <td> <?= $suggestion->get_regime()->get_montant();?> </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>