<style>
    .table td button{
        color: black; 
    }
</style>

<div class="main-panel">
    <div class="content-wrapper">
            <div class="page-header">
                    <h3 class="page-title"> Liste Régimes </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Régimes</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Catégorie</li>
                        </ol>
                    </nav>
            </div>
            <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Pour la perte</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Poids</th>
                                                <th>Durée</th>
                                                <th>Montant</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr> 
                                                <td> 5 </td>
                                                <td> 30 <td>
                                                <td>1000000</td>
                                                <td>     
                                                    <button> <i class="fas fa-eye"> </i> </button>
                                                    <button> <i class="fas fa-pencil-alt"> </i> </button>
                                                    <button> <i class="fas fa-trash-alt">  </i> </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                <h4 class="card-title">Pour la prise</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Poids</th>
                                            <th>Durée</th>
                                            <th>Montant</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr> 
                                            <td> 5 </td>
                                            <td> 30 <td>
                                            <td>1000000</td>
                                            <td>     
                                                <button> <i class="fas fa-eye"> </i> </button>
                                                <button> <i class="fas fa-pencil-alt"> </i> </button>
                                                <button> <i class="fas fa-trash-alt">  </i> </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>          
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Créer un nouveau régime</h4>
                            <form class="forms-sample" method="post" action="<?=site_url('Admin_controller/insertregime')?>">
                                <div>   
                                    <label for="type"> Type de régime </label>
                                    <select class="form-control" name="cat">
                                        <?php for ($i=0; $i < count($categorie) ; $i++) { ?>
                                            <option value="<?php echo $categorie[$i]->get_id_categorie_regime();?>"> <?php echo $categorie[$i]->get_nom();?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nom">Nom:</label>
                                    <input type="text" class="form-control" name="nom" placeholder="nom">
                                </div>
                                <div class="form-group">
                                    <label for="duree">Durée:</label>
                                    <input type="number" class="form-control" name="duree" placeholder="duree">
                                </div>
                                <div class="form-group">
                                    <label for="poids">Poids:</label>
                                    <input type="number" class="form-control" name="poids" placeholder="poids">
                                </div>
                                <div class="form-group">
                                    <label for="montant">Montant:</label>
                                    <input type="number" class="form-control" name="montant" placeholder="montant">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                                <!-- <button class="btn btn-dark">Retour</button> -->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                        <form class="forms-sample" method="post" action="<?=site_url('Admin_controller/insertperte')?>">
                            <div class="card-body">
                                <h4 class="card-title">Pour la perte</h4>
                                <div class="form-group">   
                                        <label for="type"> Type de régime </label>
                                        <select class="form-control" name="kely">
                                            <?php for ($i=0; $i < count($kely) ; $i++) { ?>
                                                <option value="<?php echo $kely[$i]->get_id_regime();?>"> <?php echo $kely[$i]->get_nom_regime();?> </option>
                                            <?php } ?>
                                        </select>
                                </div>
                                <div class="form-group">
                                        <label for="aliments">Aliments:</label>
                                        <div class="form-check">
                                            <select class="form-control" name="ali">
                                                <?php for ($i=0; $i < count($perte) ; $i++) { ?>
                                                    <option value="<?php echo $perte[$i]->get_id_aliment();?>"> <?php echo $perte[$i]->get_nom();?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>   
                                </div>  
                                </div>
                                <div class="form-group">
                                        <label for="activites">Activités:</label>
                                        <div class="form-check">
                                            <select class="form-control" name="act">
                                                <?php for ($i=0; $i < count($aperte) ; $i++) { ?>
                                                    <option value="<?php echo $aperte[$i]->get_id_activite();?>"> <?php echo $aperte[$i]->get_nom();?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>    
                                </div>
                                <span style="text-align: center;"> 
                                    <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                                    <!-- <button class="btn btn-dark">Retour</button> -->
                                </span>      
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 grid-margin stretch-card">
                    <form class="forms-sample" method="post" action="<?=site_url('Admin_controller/insertprise')?>">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Pour la prise</h4>
                                <div class="form-group">   
                                        <label for="type">Type de régime </label>
                                        <select class="form-control" name="be">
                                            <?php for ($i=0; $i < count($be) ; $i++) { ?>
                                                <option value="<?php echo $be[$i]->get_id_regime();?>"> <?php echo $be[$i]->get_nom_regime();?> </option>
                                            <?php } ?>
                                        </select>
                                </div>
                                <div class="form-group">
                                        <label for="aliments">Aliments:</label>
                                        <div class="form-check">
                                            <select class="form-control" name="ali">
                                                <?php for ($i=0; $i < count($prise) ; $i++) { ?>
                                                    <option value="<?php echo $prise[$i]->get_id_aliment();?>"> <?php echo $prise[$i]->get_nom();?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>   
                                </div>  
                                </div>
                                <div class="form-group">
                                        <label for="activites">Activités:</label>
                                        <div class="form-check">
                                            <select class="form-control" name="act">
                                                <?php for ($i=0; $i < count($aprise) ; $i++) { ?>
                                                    <option value="<?php echo $aprise[$i]->get_id_activite();?>"> <?php echo $aprise[$i]->get_nom();?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>    
                                </div>
                                <span style="text-align: center;">
                                    <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                                    <!-- <button class="btn btn-dark">Retour</button> -->
                                </span>     
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>