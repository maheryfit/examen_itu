<div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Modifier l'activité</h4>
                            <form class="forms-sample" method="post" action="<?=site_url('Admin_controller/modif_aliment?idaliment='.$aliment->get_id_aliment())?>">
                                <div class="form-group">   
                                    <label for="type"> Type de régime </label>
                                    <select class="form-control" name="idcategorie">
                                        <?php for ($i=0; $i < count($categorie) ; $i++) { ?>
                                            <option value="<?php echo $categorie[$i]->get_id_categorie_regime();?>"> <?php echo $categorie[$i]->get_nom();?> </option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" class="form-control" name="nom" value="<?=$aliment->get_nom()?>">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                                <button class="btn btn-dark"> <a href="<?=site_url("Admin_controller/aliment")?>"> Retour</a></button>
                            </form>
                        </div>
                    </div>
                </div>