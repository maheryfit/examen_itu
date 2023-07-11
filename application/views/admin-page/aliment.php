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
                        <li class="breadcrumb-item"><a href="#">Régime</a></li>
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
                                                <th>Nom</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i=0; $i < count($perte); $i++) {?> 
                                                <tr> 
                                                    <td> <?=$perte[$i]->get_nom()?>  </td>
                                                    <td>
                                                        <a href="<?= site_url("Admin_controller/deletealiment?idaliment=".$perte[$i]->get_id_aliment())?>"> <i class="fas fa-trash-alt"> </i> </a> 
                                                        <a href="<?= site_url("Admin_controller/to_modifaliment?idaliment=".$perte[$i]->get_id_aliment())?> && idcat=2"> <i class="fas fa-pencil-alt"> </i></a> 
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            
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
                                            <th>Nom</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php for ($i=0; $i < count($prise); $i++) { ?> 
                                                <tr> 
                                                    <td> <?=$prise[$i]->get_nom()?> </td>
                                                    <td>
                                                        <a href="<?= site_url("Admin_controller/deletealiment?idaliment=".$prise[$i]->get_id_aliment())?>"> <i class="fas fa-trash-alt"> </i> </a> 
                                                        <a href="<?= site_url("Admin_controller/to_modifaliment?idaliment=".$prise[$i]->get_id_aliment())?> && idcat=2"> <i class="fas fa-pencil-alt"> </i> </a> 
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                    </tbody>
                                </table>          
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Ajouter un aliment</h4>
                            <form class="forms-sample" method="post" action="<?=site_url('Admin_controller/insertaliment')?>">
                                <div class="form-group">   
                                    <label for="type"> Type de régime </label>
                                    <select class="form-control" name="idcategorie">
                                        <?php for ($i=0; $i < count($categorie) ; $i++) { ?>
                                            <option value="<?php echo $categorie[$i]->get_id_categorie_regime()?>"> <?php echo $categorie[$i]->get_nom()?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" class="form-control" name="nom" placeholder="nom">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                                <button class="btn btn-dark">Retour</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>